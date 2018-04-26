<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\UtilisateurType;
use AMUH\AmuhBundle\Entity\Utilisateur;

class UtilisateurController extends Controller{
    /**
     * @Route("/utilisateur/", name="amuh_utilisateur_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $utilisateurRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Utilisateur');
        $utilisateurs = $utilisateurRepository->findAll();
        
        return $this->render('AmuhBundle:Utilisateur:index.html.twig', ['utilisateurs' => $utilisateurs]);
    }
    
    /**
     * @Route("/utilisateur/add", name="amuh_utilisateur_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $utilisateur = new Utilisateur();
        $utilisateurRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Utilisateur');
        
        $form = $this->get('form.factory')->create(UtilisateurType::class, $utilisateur);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
			$this->getDoctrine()->getManager()->persist($utilisateur);
			$this->getDoctrine()->getManager()->flush();
			
			$session->getFlashBag()->add('success', 'Le nouvel utilisateur est bien enregistré.');
			$utilisateur = $utilisateurRepository->findAll();
			return $this->redirectToRoute('amuh_utilisateur_index', ['utilisateur' => $utilisateur]);
        }        
        
        return $this->render('AmuhBundle:Utilisateur:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/utilisateur/list", name="amuh_utilisateur_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $utilisateurRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Utilisateur');
        $utilisateur = $utilisateurRepository->findAll();
        
        return $this->render('AmuhBundle:Utilisateur:index.html.twig', ['utilisateur' => $utilisateur]);
    }
	
	/**
     * @Route("/utilisateur/edit/{idUtilisateur}", name="amuh_utilisateur_edit")
     * @param Request $request
     */
    public function editAction($idUtilisateur, Request $request){
        $utilisateurRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Utilisateur');
        $utilisateurs = $utilisateurRepository->findAll();
        
        return $this->render('AmuhBundle:Utilisateur:index.html.twig', ['utilisateur' => $utilisateurs]);
    }
	
	/**
     * @Route("/utilisateur/delete/{idUtilisateur}", name="amuh_utilisateur_delete")
     * @param Request $request
     */
    public function deleteAction($idUtilisateur, Request $request){
        $utilisateurRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Utilisateur');
        $utilisateurs = $utilisateurRepository->findAll();
        
        return $this->render('AmuhBundle:Utilisateur:index.html.twig', ['utilisateur' => $utilisateurs]);
    }
}