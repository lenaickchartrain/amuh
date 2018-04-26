<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\JourneeType;
use AMUH\AmuhBundle\Entity\Journee;

class JourneeController extends Controller{
    /**
     * @Route("/journee/", name="amuh_journee_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $user = $this->getUser();
        if($user->getUsrEtat() == 'WAITING'){
            
            //return $this->redirectToRoute('amuh_reset_password');
        }
        $journeeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Journee');
        // On va chercher la journée du jour
        $now = date('d/m/Y');
        $journee = $journeeRepository->findOneBy(['jouDate' => \DateTime::createFromFormat('d/m/Y', $now)]);
        
        $journeeorderby = $journeeRepository->getJourneeOrderByByDateOrderByConsultationDateHeure($now);
        
        $medecins = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin')->getMedecinsToday();
        // Si une journée existe alors on l'affiche sinon on la créée
        if($journee != NULL){
            return $this->render('AmuhBundle:Journee:index.html.twig', ['journee' => $journee, 'medecins' => $medecins, 'journeeorderby' => $journeeorderby]);
        }else{
            return $this->redirectToRoute('amuh_journee_add');
        }
    }
    
    /**
     * @Route("/journee/add", name="amuh_journee_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        $journee = new Journee();
        $journeeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Journee');
        
        $form = $this->get('form.factory')->create(JourneeType::class, $journee);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $checkJournee = $journeeRepository->findOneBy(['jouDate' => $journee->getJouDate()]);
            if($checkJournee == NULL){
                $this->getDoctrine()->getManager()->persist($journee);
                $this->getDoctrine()->getManager()->flush();
                
                $session->getFlashBag()->add('success', 'Le nouvel journee est bien enregistré.');
                $journees = $journeeRepository->findAll();
                return $this->redirectToRoute('amuh_journee_index', ['journees' => $journees]);
            }
            else{
                $session->getFlashBag()->add('error', 'Un journee portant ce libellé existe déjà.');
            }
            
            return $this->redirectToRoute('amuh_journee_index');
        }        
        
        return $this->render('AmuhBundle:Journee:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/journee/list", name="amuh_journee_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $journeeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Journee');
        $journees = $journeeRepository->findAll();
        
        return $this->render('AmuhBundle:Journee:index.html.twig', ['journees' => $journees]);
    }
	
	/**
     * @Route("/journee/edit/{idJournee}", name="amuh_journee_edit")
     * @param Request $request
     */
    public function editAction($idJournee, Request $request){
        $journeeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Journee');
        $journees = $journeeRepository->findAll();
        
        return $this->render('AmuhBundle:Journee:index.html.twig', ['journees' => $journees]);
    }
	
	/**
     * @Route("/journee/delete/{idJournee}", name="amuh_journee_delete")
     * @param Request $request
     */
    public function deleteAction($idJournee, Request $request){
        $journeeRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Journee');
        $journees = $journeeRepository->findAll();
        
        return $this->render('AmuhBundle:Journee:index.html.twig', ['journees' => $journees]);
    }
}
