<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\ModaliteReglement;

class LoadModaliteReglementData extends AbstractFixture implements OrderedFixtureInterface {
    //put your code here
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $moreCMU = new ModaliteReglement();
        $moreCMU->setMoreEtat('ACTIF');
        $moreCMU->setMoreLibelle('CMU');
        $manager->persist($moreCMU);
        
        $moreTiersPayant = new ModaliteReglement();
        $moreTiersPayant->setMoreEtat('ACTIF');
        $moreTiersPayant->setMoreLibelle('Tiers Payant');
        $manager->persist($moreTiersPayant);
        
        $manager->flush();
        
        $this->addReference('more-cmu', $moreCMU);
        $this->addReference('more-tierspayant', $moreTiersPayant);
    }
    
    public function getOrder(){
        return 8;
    }

}
