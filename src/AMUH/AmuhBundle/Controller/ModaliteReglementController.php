<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\ModaliteReglementType;
use AMUH\AmuhBundle\Entity\ModaliteReglement;

class ModaliteReglementController extends Controller{
    /**
     * @Route("/modalitereglement/", name="amuh_modalitereglement_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $modaliteReglementRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:ModaliteReglement');
        $modaliteReglements = $modaliteReglementRepository->findAll();
        
        return $this->render('AmuhBundle:ModaliteReglement:index.html.twig', ['modaliteReglements' => $modaliteReglements]);
    }
    
    /**
     * @Route("/modalitereglement/add", name="amuh_modalitereglement_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $modaliteReglement = new ModaliteReglement();
        $modaliteReglementRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:ModaliteReglement');
        
        $form = $this->get('form.factory')->create(ModaliteReglementType::class, $modaliteReglement);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $checkModaliteReglement = $modaliteReglementRepository->findOneBy(['moreLibelle' => $modaliteReglement->getMoreLibelle()]);
            if($checkModaliteReglement == NULL){
                $this->getDoctrine()->getManager()->persist($modaliteReglement);
                $this->getDoctrine()->getManager()->flush();
                
                $session->getFlashBag()->add('success', 'Le nouvel modaliteReglement est bien enregistré.');
                $modaliteReglements = $modaliteReglementRepository->findAll();
                return $this->redirectToRoute('amuh_modalitereglement_index', ['modaliteReglements' => $modaliteReglements]);
            }
            else{
                $session->getFlashBag()->add('error', 'Un modaliteReglement portant ce libellé existe déjà.');
            }
        }        
        
        return $this->render('AmuhBundle:ModaliteReglement:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/modalitereglement/list", name="amuh_modalitereglement_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $modaliteReglementRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:ModaliteReglement');
        $modaliteReglements = $modaliteReglementRepository->findAll();
        
        return $this->render('AmuhBundle:ModaliteReglement:index.html.twig', ['modaliteReglements' => $modaliteReglements]);
    }
	
	/**
     * @Route("/modalitereglement/edit/{idModaliteReglement}", name="amuh_modalitereglement_edit")
     * @param Request $request
     */
    public function editAction($idModaliteReglement, Request $request){
        $modaliteReglementRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:ModaliteReglement');
        $modaliteReglements = $modaliteReglementRepository->findAll();
        
        return $this->render('AmuhBundle:ModaliteReglement:index.html.twig', ['modaliteReglements' => $modaliteReglements]);
    }
	
	/**
     * @Route("/modalitereglement/delete/{idModaliteReglement}", name="amuh_modalitereglement_delete")
     * @param Request $request
     */
    public function deleteAction($idModaliteReglement, Request $request){
        $modaliteReglementRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:ModaliteReglement');
        $modaliteReglements = $modaliteReglementRepository->findAll();
        
        return $this->render('AmuhBundle:ModaliteReglement:index.html.twig', ['modaliteReglements' => $modaliteReglements]);
    }
}
