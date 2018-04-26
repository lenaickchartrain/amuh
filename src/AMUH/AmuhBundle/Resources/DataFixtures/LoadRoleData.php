<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\Role;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface {
    //put your code here
    public function getOrder() {
        return 3;
    }

    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $roleSecretaire = new Role();
        $roleSecretaire->setRolEtat('ACTIF');
        $roleSecretaire->setRolLibelle('ROLE_SECRETAIRE');
        
        $manager->persist($roleSecretaire);
        
        $roleAdministration = new Role();
        $roleAdministration->setRolEtat('ACTIF');
        $roleAdministration->setRolLibelle('ROLE_ADMINISTRATION');
        
        $manager->persist($roleAdministration);
        
        $manager->flush();
        
        $this->addReference('role-secretaire', $roleSecretaire);
        $this->addReference('role-administration', $roleAdministration);
    }

}
