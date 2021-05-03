<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture implements OrderedFixtureInterface
{
    public const COUNTRY_REFERENCE = 'country-';

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i<10; $i++) {
            $country= new Country();
            $country->setName('country'.$i);
            $this->setReference(self::COUNTRY_REFERENCE.$i, $country);
            $manager->persist($country);
            $manager->flush();
        }
    }

    /**
     *
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

    public function getDependencies()
    {
        return array(
            LocationFixtures::class
        );
    }
}