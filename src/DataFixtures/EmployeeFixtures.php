<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture implements OrderedFixtureInterface
{
    public const EMPLOYEE_REFERENCE = 'employee-';

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i<10; $i++) {
            $employee = new Employee();
            $employee->setName('Employee'.$i);
            $employee->setCin($i);
            $employee->setPhoneNumber($i);
            $this->addReference(self::EMPLOYEE_REFERENCE.$i, $employee);
            $employee->setJob($this->getReference('job-'.$i));
            $manager->persist($employee);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 5;
    }
}