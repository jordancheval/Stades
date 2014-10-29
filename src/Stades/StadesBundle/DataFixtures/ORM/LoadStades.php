<?php

namespace Stades\StadesBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Stades\StadesBundle\Entity\Stades;

class LoadStades implements FixtureInterface
{
    public function load(ObjectManager $manager) {
        $stade = new Stades();
        
        $stade->setNomStade("Montigny-lès-Metz");
        $stade->setAdresseStade("Rue du Mont Cassin");
        $stade->setLienMaps("https://www.google.com/maps/d/viewer?mid=zeb_7Gse8a2Y.k7PiJ1j9slXg&msa=0");
        
        $manager->persist($stade);
        
        $manager->flush();
    }
}