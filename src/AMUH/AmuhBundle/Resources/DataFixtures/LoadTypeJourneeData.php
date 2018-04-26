<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\TypeJournee;

class LoadTypeJourneeData extends AbstractFixture implements OrderedFixtureInterface{
    //put your code here
    
    public function getOrder() {
        return 9;
    }

    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $tyjoJEP = new TypeJournee();
        $tyjoJEP->setTpjEtat('ACTIF');
        $tyjoJEP->setTpjLibelle('JEP');
        $tyjoJEP->setTpjNbMedecin(2);
        $tyjoJEP->setTpjNbSecretaire(2);
        $manager->persist($tyjoJEP);
        
        $tyjoSamedi = new TypeJournee();
        $tyjoSamedi->setTpjEtat('ACTIF');
        $tyjoSamedi->setTpjLibelle('Samedi');
        $tyjoSamedi->setTpjNbMedecin(2);
        $tyjoSamedi->setTpjNbSecretaire(2);
        $manager->persist($tyjoSamedi);
        
        $manager->flush();
        
        $this->addReference('tyjo-jep', $tyjoJEP);
        $this->addReference('tyjo-samedi', $tyjoSamedi);
        
    }

}
