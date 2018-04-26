<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\OrientationType;
use AMUH\AmuhBundle\Entity\Orientation;

class OrientationController extends Controller{
    /**
     * @Route("/orientation/", name="amuh_orientation_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $orientationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Orientation');
        $orientations = $orientationRepository->findAll();
        
        return $this->render('AmuhBundle:Orientation:index.html.twig', ['orientations' => $orientations]);
    }
    
    /**
     * @Route("/orientation/add", name="amuh_orientation_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $orientation = new Orientation();
        $orientationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Orientation');
        
        $form = $this->get('form.factory')->create(OrientationType::class, $orientation);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $checkOrientation = $orientationRepository->findOneBy(['oriLibelle' => $orientation->getOriLibelle()]);
            if($checkOrientation == NULL){
                $this->getDoctrine()->getManager()->persist($orientation);
                $this->getDoctrine()->getManager()->flush();
                
                $session->getFlashBag()->add('success', 'Le nouvel orientation est bien enregistré.');
                $orientations = $orientationRepository->findAll();
                return $this->redirectToRoute('amuh_orientation_index', ['orientations' => $orientations]);
            }
            else{
                $session->getFlashBag()->add('error', 'Un orientation portant ce libellé existe déjà.');
            }
        }        
        
        return $this->render('AmuhBundle:Orientation:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/orientation/list", name="amuh_orientation_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $orientationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Orientation');
        $orientations = $orientationRepository->findAll();
        
        return $this->render('AmuhBundle:Orientation:index.html.twig', ['orientations' => $orientations]);
    }
	
	/**
     * @Route("/orientation/edit/{idOrientation}", name="amuh_orientation_edit")
     * @param Request $request
     */
    public function editAction($idOrientation, Request $request){
        $orientationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Orientation');
        $orientations = $orientationRepository->findAll();
        
        return $this->render('AmuhBundle:Orientation:index.html.twig', ['orientations' => $orientations]);
    }
	
	/**
     * @Route("/orientation/delete/{idOrientation}", name="amuh_orientation_delete")
     * @param Request $request
     */
    public function deleteAction($idOrientation, Request $request){
        $orientationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Orientation');
        $orientations = $orientationRepository->findAll();
        
        return $this->render('AmuhBundle:Orientation:index.html.twig', ['orientations' => $orientations]);
    }
}
