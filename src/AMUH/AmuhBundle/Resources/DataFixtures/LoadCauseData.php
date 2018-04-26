<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\Cause;

class LoadCauseData extends AbstractFixture implements OrderedFixtureInterface {
    //put your code here
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $causePbDermatologique = new Cause();
        $causePbDermatologique->setCauEtat('ACTIF');
        $causePbDermatologique->setCauLibelle('Pb Dermatologique');
        $manager->persist($causePbDermatologique);
        
        $causePbRespiratoire = new Cause();
        $causePbRespiratoire->setCauEtat('ACTIF');
        $causePbRespiratoire->setCauLibelle('Pb respiratoire');
        $manager->persist($causePbRespiratoire);
        
        $causePbSocial = new Cause();
        $causePbSocial->setCauEtat('ACTIF');
        $causePbSocial->setCauLibelle('Pb social');
        $manager->persist($causePbSocial);
        
        $causeRenouvellementOrdonnance = new Cause();
        $causeRenouvellementOrdonnance->setCauEtat('ACTIF');
        $causeRenouvellementOrdonnance->setCauLibelle('Renouvellement Ordonnance');
        $manager->persist($causeRenouvellementOrdonnance);
        
        $causeAutre = new Cause();
        $causeAutre->setCauEtat('ACTIF');
        $causeAutre->setCauLibelle('Autre');
        $manager->persist($causeAutre);
        
        $manager->flush();
        
        $this->addReference('cause-pbdermatologique', $causePbDermatologique);
        $this->addReference('cause-pbrespiratoire', $causePbRespiratoire);
        $this->addReference('cause-pbsocial', $causePbSocial);
        $this->addReference('cause-autre', $causeAutre);
    }
    
    public function getOrder(){
        return 7;
    }

}
