<?php

namespace AMUH\AmuhBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\RoleType;
use AMUH\AmuhBundle\Entity\Role;

class RoleController extends Controller{
    //put your code here
    /**
     * @Route("/role/", name="amuh_role_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $roleRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Role');
        $roles = $roleRepository->findAll();
        
        return $this->render('AmuhBundle:Role:index.html.twig', ['roles' => $roles]);
    }
    
    /**
     * @Route("/role/add", name="amuh_role_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $role = new Role();
        $roleRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Role');
        
        $form = $this->get('form.factory')->create(RoleType::class, $role);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->getDoctrine()->getManager()->persist($role);
            $this->getDoctrine()->getManager()->flush();

            $session->getFlashBag()->add('success', 'Le nouvel role est bien enregistré.');
            $roles = $roleRepository->findAll();
            return $this->redirectToRoute('amuh_role_index', ['roles' => $roles]);
        }        
        
        return $this->render('AmuhBundle:Role:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/role/list", name="amuh_role_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $roleRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Role');
        $roles = $roleRepository->findAll();
        
        return $this->render('AmuhBundle:Role:index.html.twig', ['role' => $roles]);
    }
	
	/**
     * @Route("/role/edit/{idRole}", name="amuh_role_edit")
     * @param Request $request
     */
    public function editAction($idRole, Request $request){
        $roleRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Role');
        $roles = $roleRepository->findAll();
        
        return $this->render('AmuhBundle:Role:index.html.twig', ['role' => $roles]);
    }
	
	/**
     * @Route("/role/delete/{idRole}", name="amuh_role_delete")
     * @param Request $request
     */
    public function deleteAction($idRole, Request $request){
        $roleRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Role');
        $roles = $roleRepository->findAll();
        
        return $this->render('AmuhBundle:Role:index.html.twig', ['role' => $roles]);
    }
}
