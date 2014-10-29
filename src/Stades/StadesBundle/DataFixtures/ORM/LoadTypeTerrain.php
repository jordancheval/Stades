<?php

namespace Stades\StadesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Stades\StadesBundle\Entity\TypeTerrain;

class LoadTypeTerrain implements FixtureInterface
{
    public function load(ObjectManager $manager) {
        $names = array(
            'Pelouse synthétique',
            'Pelouse naturelle',
            'Terrain schiste'
        );
        
        foreach ($names as $name) {
            $typeTerrain = new TypeTerrain();
            $typeTerrain->setTypeTerrain($name);
            
            $manager->persist($typeTerrain);
        }
        
        $manager->flush();
    }
}