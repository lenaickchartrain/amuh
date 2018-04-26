<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\CauseType;
use AMUH\AmuhBundle\Entity\Cause;

class CauseController extends Controller{
    /**
     * @Route("/cause/", name="amuh_cause_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $causeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Cause');
        $causes = $causeRepository->findAll();
        
        return $this->render('AmuhBundle:Cause:index.html.twig', ['causes' => $causes]);
    }
    
    /**
     * @Route("/cause/add", name="amuh_cause_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $cause = new Cause();
        $causeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Cause');
        
        $form = $this->get('form.factory')->create(CauseType::class, $cause);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $checkCause = $causeRepository->findOneBy(['cauLibelle' => $cause->getCauLibelle()]);
            if($checkCause == NULL){
                $this->getDoctrine()->getManager()->persist($cause);
                $this->getDoctrine()->getManager()->flush();
                
                $session->getFlashBag()->add('success', 'Le nouvel cause est bien enregistré.');
                $causes = $causeRepository->findAll();
                return $this->redirectToRoute('amuh_cause_index', ['causes' => $causes]);
            }
            else{
                $session->getFlashBag()->add('error', 'Un cause portant ce libellé existe déjà.');
            }
        }        
        
        return $this->render('AmuhBundle:Cause:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/cause/list", name="amuh_cause_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $causeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Cause');
        $causes = $causeRepository->findAll();
        
        return $this->render('AmuhBundle:Cause:index.html.twig', ['causes' => $causes]);
    }
	
	/**
     * @Route("/cause/edit/{idCause}", name="amuh_cause_edit")
     * @param Request $request
     */
    public function editAction($idCause, Request $request){
        $causeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Cause');
        $causes = $causeRepository->findAll();
        
        return $this->render('AmuhBundle:Cause:index.html.twig', ['causes' => $causes]);
    }
	
	/**
     * @Route("/cause/delete/{idCause}", name="amuh_cause_delete")
     * @param Request $request
     */
    public function deleteAction($idCause, Request $request){
        $causeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Cause');
        $causes = $causeRepository->findAll();
        
        return $this->render('AmuhBundle:Cause:index.html.twig', ['causes' => $causes]);
    }
}
