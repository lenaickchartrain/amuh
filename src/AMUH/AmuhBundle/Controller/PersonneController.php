<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\PersonneType;
use AMUH\AmuhBundle\Entity\Personne;

class PersonneController extends Controller{
    /**
     * @Route("/personne/", name="amuh_personne_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $personneRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Personne');
        $personnes = $personneRepository->findAll();
        
        return $this->render('AmuhBundle:Personne:index.html.twig', ['personnes' => $personnes]);
    }
    
    /**
     * @Route("/personne/add", name="amuh_personne_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $personne = new Personne();
        $personneRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Personne');
		
        $form = $this->get('form.factory')->create(PersonneType::class, $personne);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->getDoctrine()->getManager()->persist($personne);
            $this->getDoctrine()->getManager()->flush();

            $session->getFlashBag()->add('success', 'Le nouvel personne est bien enregistré.');
            $personnes = $personneRepository->findAll();
            return $this->redirectToRoute('amuh_personne_index', ['personne' => $personnes]);
        }        
        
        return $this->render('AmuhBundle:Personne:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/personne/list", name="amuh_personne_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $personneRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Personne');
        $personnes = $personneRepository->findAll();
        
        return $this->render('AmuhBundle:Personne:index.html.twig', ['personne' => $personnes]);
    }
	
	/**
     * @Route("/personne/edit/{idPersonne}", name="amuh_personne_edit")
     * @param Request $request
     */
    public function editAction($idPersonne, Request $request){
        $personneRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Personne');
        $personnes = $personneRepository->findAll();
        
        return $this->render('AmuhBundle:Personne:index.html.twig', ['personne' => $personnes]);
    }
	
	/**
     * @Route("/personne/delete/{idPersonne}", name="amuh_personne_delete")
     * @param Request $request
     */
    public function deleteAction($idPersonne, Request $request){
        $personneRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Personne');
        $personnes = $personneRepository->findAll();
        
        return $this->render('AmuhBundle:Personne:index.html.twig', ['personne' => $personnes]);
    }
}