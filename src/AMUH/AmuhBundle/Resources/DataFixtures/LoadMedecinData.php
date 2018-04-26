<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\Medecin;

class LoadMedecinData extends AbstractFixture implements OrderedFixtureInterface{
    //put your code here
    public function getOrder() {
        return 5;
    }

    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $medecin1 = new Medecin();
        $medecin1->setMedEtat('ACTIF');
        $medecin1->setMedRue('55 rue e saint Quantin');
        $medecin1->setMedComplementAdresse('');
        $medecin1->setMedCodePostal('76700');
        $medecin1->setMedVille('LE HAVRE');
        $medecin1->setPrsNom('CAZAUX');
        $medecin1->setPrsNomJeuneFille('');
        $medecin1->setPrsPrenom('Dominique');
        $medecin1->setPrsTelephone('0123456789');
        
        $manager->persist($medecin1);
        
        $medecin2 = new Medecin();
        $medecin2->setMedEtat('ACTIF');
        $medecin2->setMedRue('rue inconnue');
        $medecin2->setMedComplementAdresse('');
        $medecin2->setMedCodePostal('76700');
        $medecin2->setMedVille('LE HAVRE');
        $medecin2->setPrsNom('DUMESNIL');
        $medecin2->setPrsNomJeuneFille('');
        $medecin2->setPrsPrenom('Jean-Luc');
        $medecin2->setPrsTelephone('0123456789');
        
        $manager->persist($medecin2);
        
        $manager->flush();
        
        $this->addReference('medecin-1', $medecin1);
        $this->addReference('medecin-2', $medecin2);
    }

}
