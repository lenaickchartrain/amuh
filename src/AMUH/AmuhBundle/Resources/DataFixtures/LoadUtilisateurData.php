<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\Utilisateur;

class LoadUtilisateurData extends AbstractFixture implements OrderedFixtureInterface {
    //put your code here
    public function getOrder() {
        return 4;
    }

    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $utilisateurMylene = new Utilisateur();
        $utilisateurMylene->setUsrEtat('ACTIF');
        $utilisateurMylene->setUsrEmail('sivelia@live.fr');
        $utilisateurMylene->setUsrPassword('mylene');
        $utilisateurMylene->setUsrSalt('');
        $utilisateurMylene->setPrsNom('LE GAUDION');
        $utilisateurMylene->setPrsNomJeuneFille('');
        $utilisateurMylene->setPrsPrenom('Mylène');
        $utilisateurMylene->setPrsTelephone('0123456789');
        $utilisateurMylene->addRole($this->getReference('role-secretaire'));
        
        $manager->persist($utilisateurMylene);
        
        $utilisateurLenaick = new Utilisateur();
        $utilisateurLenaick->setUsrEtat('ACTIF');
        $utilisateurLenaick->setUsrEmail('lenaickchartrain@gmail.com');
        $utilisateurLenaick->setUsrPassword('lenaick');
        $utilisateurLenaick->setUsrSalt('');
        $utilisateurLenaick->setPrsNom('CHARTRAIN');
        $utilisateurLenaick->setPrsNomJeuneFille('');
        $utilisateurLenaick->setPrsPrenom('Lénaïck');
        $utilisateurLenaick->setPrsTelephone('0123456789');        
        $utilisateurMylene->addRole($this->getReference('role-administration'));
        
        $manager->persist($utilisateurLenaick);
        
        $manager->flush();
        
        $this->addReference('utilisateur-mylene', $utilisateurMylene);
        $this->addReference('utilisateur-lenaick', $utilisateurLenaick);
    }

}
