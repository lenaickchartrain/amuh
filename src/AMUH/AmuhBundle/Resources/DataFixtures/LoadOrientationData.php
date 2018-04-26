<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\Orientation;

class LoadOrientationData extends AbstractFixture implements OrderedFixtureInterface {
    //put your code here
    public function getOrder() {
        return 6;
    }

    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $orientationRegule = new Orientation();
        $orientationRegule->setOriEtat('ACTIF');
        $orientationRegule->setoriLibelle('Régulé');
        $manager->persist($orientationRegule);
        
        $orientationNonRegule = new Orientation();
        $orientationNonRegule->setOriEtat('ACTIF');
        $orientationNonRegule->setoriLibelle('Non Régulé');
        $manager->persist($orientationNonRegule);
        
        $manager->flush();
        
        $this->addReference('ori-regule', $orientationRegule);
        $this->addReference('ori-nonregule', $orientationNonRegule);
    }

}
