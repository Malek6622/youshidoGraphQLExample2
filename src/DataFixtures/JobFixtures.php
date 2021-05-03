<?php

namespace App\DataFixtures;


use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class JobFixtures extends Fixture implements OrderedFixtureInterface
{
    public const JOB_REFERENCE = 'job-';

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i<10; $i++) {
            $job = new Job();
            $this->addReference(self::JOB_REFERENCE.$i, $job);
            $job->setTitle('job'.$i);
            $job->setSalary($i);
            $job->setDepartment($this->getReference('department-'.$i));
            $manager->persist($job);
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return array(
            EmployeeFixtures::class
        );
    }

    public function getOrder()
    {
        return 4;
    }
}