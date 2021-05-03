<?php


namespace App\DataFixtures;


use App\Entity\Department;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DepartmentFixtures extends Fixture implements OrderedFixtureInterface
{
    public const DEPARTMENT_REFERENCE = 'department-';

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i<10; $i++) {
            $department = new Department();
            $this->addReference(self::DEPARTMENT_REFERENCE.$i, $department);
            $department->setName('department'.$i);
            $department->setLocation($this->getReference('location-'.$i));
            $manager->persist($department);
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return array(
            JobFixtures::class
        );
    }

    public function getOrder()
    {
        return 3;
    }
}