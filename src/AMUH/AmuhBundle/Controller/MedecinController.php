<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\MedecinType;
use AMUH\AmuhBundle\Entity\Medecin;

class MedecinController extends Controller{
    /**
     * @Route("/medecin/", name="amuh_medecin_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $medecinRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin');
        $medecins = $medecinRepository->findAll();
        
        return $this->render('AmuhBundle:Medecin:index.html.twig', ['medecins' => $medecins]);
    }
    
    /**
     * @Route("/medecin/add", name="amuh_medecin_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $medecin = new Medecin();
        $medecinRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin');
        
        $form = $this->get('form.factory')->create(MedecinType::class, $medecin);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
			$this->getDoctrine()->getManager()->persist($medecin);
			$this->getDoctrine()->getManager()->flush();
			
			$session->getFlashBag()->add('success', 'Le nouvel medecin est bien enregistré.');
			$medecins = $medecinRepository->findAll();
			return $this->redirectToRoute('amuh_medecin_index', ['medecin' => $medecins]);
        }        
        
        return $this->render('AmuhBundle:Medecin:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/medecin/list", name="amuh_medecin_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $medecinRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin');
        $medecins = $medecinRepository->findAll();
        
        return $this->render('AmuhBundle:Medecin:index.html.twig', ['medecin' => $medecins]);
    }
	
	/**
     * @Route("/medecin/edit/{idMedecin}", name="amuh_medecin_edit")
     * @param Request $request
     */
    public function editAction($idMedecin, Request $request){
        $medecinRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin');
        $medecins = $medecinRepository->findAll();
        
        return $this->render('AmuhBundle:Medecin:index.html.twig', ['medecin' => $medecins]);
    }
	
	/**
     * @Route("/medecin/delete/{idMedecin}", name="amuh_medecin_delete")
     * @param Request $request
     */
    public function deleteAction($idMedecin, Request $request){
        $medecinRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin');
        $medecins = $medecinRepository->findAll();
        
        return $this->render('AmuhBundle:Medecin:index.html.twig', ['medecin' => $medecins]);
    }
}