<?php


namespace App\DataFixtures;


use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture implements OrderedFixtureInterface
{
    public const LOCATION_REFERENCE = 'location-';

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i<10; $i++) {
            $location = new Location();
            $this->addReference(self::LOCATION_REFERENCE.$i, $location);
            $location->setAddress('address'.$i);
            $location->setPostalCode($i);
            $location->setCountry($this->getReference('country-'.$i));
            $manager->persist($location);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 2;
    }
}