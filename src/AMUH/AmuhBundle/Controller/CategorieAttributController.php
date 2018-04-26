<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\CategorieAttributType;
use AMUH\AmuhBundle\Entity\CategorieAttribut;

class CategorieAttributController extends Controller{
    //put your code here
    /**
     * @Route("/categorieattribut/", name="amuh_categorieattribut_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $categorieAttributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:CategorieAttribut');
        $categorieAttributs = $categorieAttributRepository->findAll();
        
        return $this->render('AmuhBundle:CategorieAttribut:index.html.twig', ['categorieAttributs' => $categorieAttributs]);
    }
    
    /**
     * @Route("/categorieattribut/add", name="amuh_categorieattribut_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $categorieAttribut = new CategorieAttribut();
        $categorieAttributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:CategorieAttribut');
        
        $form = $this->get('form.factory')->create(CategorieAttributType::class, $categorieAttribut);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $checkCategorieAttribut = $categorieAttributRepository->findOneBy(['catLibelle' => $categorieAttribut->getCatLibelle()]);
            if($checkCategorieAttribut == NULL){
                $this->getDoctrine()->getManager()->persist($categorieAttribut);
                $this->getDoctrine()->getManager()->flush();
                
                $session->getFlashBag()->add('success', 'Le nouvel attribut est bien enregistré.');
                $categorieAttributs = $categorieAttributRepository->findAll();
                return $this->redirectToRoute('amuh_categorieattribut_index', ['categorieAttributs' => $categorieAttributs]);
            }
            else{
                $session->getFlashBag()->add('error', 'Un attribut portant ce libellé existe déjà.');
            }
        }        
        
        return $this->render('AmuhBundle:CategorieAttribut:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/categorieattribut/list", name="amuh_categorieattribut_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $categorieAttributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:CategorieAttribut');
        $categorieAttributs = $categorieAttributRepository->findAll();
        
        return $this->render('AmuhBundle:CategorieAttribut:index.html.twig', ['categorieAttributs' => $categorieAttributs]);
    }
	
	/**
     * @Route("/categorieattribut/edit/{idCategorieAttribut}", name="amuh_categorieattribut_edit")
     * @param Request $request
     */
    public function edittAction($idCategorieAttribut, Request $request){
        $categorieAttributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:CategorieAttribut');
        $categorieAttributs = $categorieAttributRepository->findAll();
        
        return $this->render('AmuhBundle:CategorieAttribut:index.html.twig', ['categorieAttributs' => $categorieAttributs]);
    }
	
	/**
     * @Route("/categorieattribut/delete/{idCategorieAttribut}", name="amuh_categorieattribut_delete")
     * @param Request $request
     */
    public function deleteAction($idCategorieAttribut, Request $request){
        $categorieAttributRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:CategorieAttribut');
        $categorieAttributs = $categorieAttributRepository->findAll();
        
        return $this->render('AmuhBundle:CategorieAttribut:index.html.twig', ['categorieAttributs' => $categorieAttributs]);
    }
}
