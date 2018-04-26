<?php

namespace test\AMUH\AmuhBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JourneeControllerTest extends WebTestCase{
    //put your code here
    public function testIndexJourneeInexistante(){
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/journee/');
        // S'il n'y a pas de journée, nous sommes redirigés vers journee/add
        $client->followRedirect();
        $this->assertEquals(200,$client->getResponse()->getStatusCode());
        //$this->assertEquals('/\journee/add$', $client->getResponse()->headers->get('location'));
        $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 200');
    }
    
    public function testAddJournee(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/journee/add');
        
        $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 200');
        
        $form = $crawler->selectButton('amuh_amuhbundle_journee[save]')->form();
        
        $form['amuh_amuhbundle_journee[jouDate][year]']->select(2017);
        $form['amuh_amuhbundle_journee[jouDate][month]']->select(9);
        $form['amuh_amuhbundle_journee[jouDate][day]']->select(4);
        $typeJourneeValues = $form['amuh_amuhbundle_journee[typeJournee]']->availableOptionValues();
        $form['amuh_amuhbundle_journee[typeJournee]']->select($typeJourneeValues[1]);
        $secretairesValues = $form['amuh_amuhbundle_journee[secretaires]']->availableOptionValues();
        $form['amuh_amuhbundle_journee[secretaires]']->select($secretairesValues[1]);
        $medecinsValues = $form['amuh_amuhbundle_journee[medecins]']->availableOptionValues();
        $form['amuh_amuhbundle_journee[medecins]']->select($medecinsValues[1]);
        
        $client->submit($form);
    }
}
