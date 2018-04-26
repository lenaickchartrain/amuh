<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\AttributType;
use AMUH\AmuhBundle\Entity\Attribut;

class AttributController extends Controller{
    /**
     * @Route("/attribut/", name="amuh_attribut_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $attributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Attribut');
        $attributs = $attributRepository->findAll();
        
        return $this->render('AmuhBundle:Attribut:index.html.twig', ['attributs' => $attributs]);
    }
    
    /**
     * @Route("/attribut/add", name="amuh_attribut_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $attribut = new Attribut();
        $attributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Attribut');
        
        $form = $this->get('form.factory')->create(AttributType::class, $attribut);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $checkAttribut = $attributRepository->findOneBy(['atbLibelle' => $attribut->getAtbLibelle()]);
            if($checkAttribut == NULL){
                $this->getDoctrine()->getManager()->persist($attribut);
                $this->getDoctrine()->getManager()->flush();
                
                $session->getFlashBag()->add('success', 'Le nouvel attribut est bien enregistré.');
                $attributs = $attributRepository->findAll();
                return $this->redirectToRoute('amuh_attribut_index', ['attributs' => $attributs]);
            }
            else{
                $session->getFlashBag()->add('error', 'Un attribut portant ce libellé existe déjà.');
            }
        }        
        
        return $this->render('AmuhBundle:Attribut:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/attribut/list", name="amuh_attribut_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $attributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Attribut');
        $attributs = $attributRepository->findAll();
        
        return $this->render('AmuhBundle:Attribut:index.html.twig', ['attributs' => $attributs]);
    }
	
	/**
     * @Route("/attribut/edit/{idAttribut}", name="amuh_attribut_edit")
     * @param Request $request
     */
    public function editAction($idAttribut, Request $request){
        $attributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Attribut');
        $attributs = $attributRepository->findAll();
        
        return $this->render('AmuhBundle:Attribut:index.html.twig', ['attributs' => $attributs]);
    }
	
	/**
     * @Route("/attribut/delete/{idAttribut}", name="amuh_attribut_delete")
     * @param Request $request
     */
    public function deleteAction($idAttribut, Request $request){
        $attributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Attribut');
        $attributs = $attributRepository->findAll();
        
        return $this->render('AmuhBundle:Attribut:index.html.twig', ['attributs' => $attributs]);
    }
}
