<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AMUH\AmuhBundle\Entity\Attribut;

class LoadAttributData extends AbstractFixture implements OrderedFixtureInterface {
    //put your code here
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager) {
        $attributNom = new Attribut();
        $attributNom->setAtbEtat('ACTIF');
        $attributNom->setAtbLibelle('Nom');
        $attributNom->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributNom);
        
        $attributPrenom = new Attribut();
        $attributPrenom->setAtbEtat('ACTIF');
        $attributPrenom->setAtbLibelle('Prenom');
        $attributPrenom->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributPrenom);
        
        $attributAge = new Attribut();
        $attributAge->setAtbEtat('ACTIF');
        $attributAge->setAtbLibelle('Age');
        $attributAge->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributAge);
        
        $attributGenre = new Attribut();
        $attributGenre->setAtbEtat('ACTIF');
        $attributGenre->setAtbLibelle('Genre');
        $attributGenre->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributGenre);
        
        $attributRegule = new Attribut();
        $attributRegule->setAtbEtat('ACTIF');
        $attributRegule->setAtbLibelle('Régulé');
        $attributRegule->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributRegule);
        
        $attributCause = new Attribut();
        $attributCause->setAtbEtat('ACTIF');
        $attributCause->setAtbLibelle('Cause');
        $attributCause->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributCause);
        
        $attributCodePostal = new Attribut();
        $attributCodePostal->setAtbEtat('ACTIF');
        $attributCodePostal->setAtbLibelle('Code postal');
        $attributCodePostal->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributCodePostal);
        
        $attributVille = new Attribut();
        $attributVille->setAtbEtat('ACTIF');
        $attributVille->setAtbLibelle('Ville');
        $attributVille->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributVille);
        
        $attributMontant = new Attribut();
        $attributMontant->setAtbEtat('ACTIF');
        $attributMontant->setAtbLibelle('Montant');
        $attributMontant->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributMontant);
        
        $attributModaliteReglement = new Attribut();
        $attributModaliteReglement->setAtbEtat('ACTIF');
        $attributModaliteReglement->setAtbLibelle('Modalité de règlement');
        $attributModaliteReglement->setCategorieAttribut($this->getReference('categ-consultation'));
        
        $manager->persist($attributModaliteReglement);
        
        $manager->flush();
        
        $this->addReference('atb-genre', $attributGenre);
        $this->addReference('atb-nom', $attributNom);
        $this->addReference('atb-prenom', $attributPrenom);
        $this->addReference('atb-age', $attributAge);
        $this->addReference('atb-codeposte', $attributCodePostal);
        $this->addReference('atb-ville', $attributVille);
        $this->addReference('atb-modalitereglement', $attributModaliteReglement);
        $this->addReference('atb-montant', $attributMontant);
        $this->addReference('atb-cause', $attributCause);
        $this->addReference('atb-regule', $attributRegule);
        
    }

    public function getOrder() {
        return 2;
    }

}
