<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\CategorieAttribut;

class LoadCategorieAttributData extends AbstractFixture implements OrderedFixtureInterface {
    //put your code here
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $categorieAttribut = new CategorieAttribut();
        $categorieAttribut->setCatEtat('ACTIF');
        $categorieAttribut->setCatLibelle('Consultation');
        $manager->persist($categorieAttribut);
        $manager->flush();
        
        $this->addReference('categ-consultation', $categorieAttribut);
    }
    
    public function getOrder(){
        return 1;
    }

}
