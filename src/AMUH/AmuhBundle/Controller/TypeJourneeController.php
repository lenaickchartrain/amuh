<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\TypeJourneeType;
use AMUH\AmuhBundle\Entity\TypeJournee;

class TypeJourneeController extends Controller{
    /**
     * @Route("/typejournee/", name="amuh_typejournee_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $typeJourneeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:TypeJournee');
        $typeJournees = $typeJourneeRepository->findAll();
        
        return $this->render('AmuhBundle:TypeJournee:index.html.twig', ['typeJournees' => $typeJournees]);
    }
    
    /**
     * @Route("/typejournee/add", name="amuh_typejournee_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $typeJournee = new TypeJournee();
        $typeJourneeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:TypeJournee');
        
        $form = $this->get('form.factory')->create(TypeJourneeType::class, $typeJournee);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $checkJournee = $typeJourneeRepository->findOneBy(['tpjLibelle' => $typeJournee->getTpjLibelle()]);
            if($checkJournee == NULL){
                $this->getDoctrine()->getManager()->persist($typeJournee);
                $this->getDoctrine()->getManager()->flush();
                
                $session->getFlashBag()->add('success', 'Le nouvel typeJournee est bien enregistré.');
                $typeJournees = $typeJourneeRepository->findAll();
                return $this->redirectToRoute('amuh_typejournee_index', ['typeJournees' => $typeJournees]);
            }
            else{
                $session->getFlashBag()->add('error', 'Un typeJournee portant ce libellé existe déjà.');
            }
            
            return $this->redirectToRoute('amuh_typejournee_index');
        }        
        
        return $this->render('AmuhBundle:TypeJournee:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/typejournee/list", name="amuh_typejournee_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $typeJourneeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:TypeJournee');
        $typeJournees = $typeJourneeRepository->findAll();
        
        return $this->render('AmuhBundle:TypeJournee:index.html.twig', ['typeJournees' => $typeJournees]);
    }
	
	/**
     * @Route("/typejournee/edit/{idTypeJournee}", name="amuh_typejournee_edit")
     * @param Request $request
     */
    public function editAction($idTypeJournee, Request $request){
        $typeJourneeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:TypeJournee');
        $typeJournees = $typeJourneeRepository->findAll();
        
        return $this->render('AmuhBundle:TypeJournee:index.html.twig', ['typeJournees' => $typeJournees]);
    }
	
	/**
     * @Route("/typejournee/delete/{idTypeJournee}", name="amuh_typejournee_delete")
     * @param Request $request
     */
    public function deleteAction($idTypeJournee, Request $request){
        $typeJourneeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:TypeJournee');
        $typeJournees = $typeJourneeRepository->findAll();
        
        return $this->render('AmuhBundle:TypeJournee:index.html.twig', ['typeJournees' => $typeJournees]);
    }
}