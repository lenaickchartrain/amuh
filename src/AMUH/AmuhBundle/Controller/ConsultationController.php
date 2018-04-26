<?php

namespace AMUH\AmuhBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AMUH\AmuhBundle\Form\ConsultationType;
use AMUH\AmuhBundle\Entity\Consultation;
use AMUH\AmuhBundle\Entity\ConsultationData;

class ConsultationController extends Controller{
    /**
     * @Route("/consultation/", name="amuh_consultation_index")
     * @param Request $request
     */
    public function indexAction(Request $request){
        $consultationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Consultation');
        $consultations = $consultationRepository->getConsultationsWithData();
		
        $consultationDataRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:ConsultationData');

        foreach($consultations as $consultation){
                $consultationDatasForConsultation = $consultationDataRepository->findByConsultation($consultation);
                foreach($consultationDatasForConsultation as $consultationData){
                        $consultation->addConsultationData($consultationData);
                }			
        }

        // $medecin = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin')->findMedecinByIDPersonne('5ca9d964-8bc0-11e7-a0e7-705a0f4838cf');
        // $utilisateur = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Utilisateur')->findUtilisateurByIdPersonne('08d7ccd3-8bbb-11e7-a0e7-705a0f4838cf');
		
        return $this->render('AmuhBundle:Consultation:index.html.twig', ['consultations' => $consultations]);
    }
    
    /**
     * @Route("/consultation/add", name="amuh_consultation_add")
     * @param Request $request
     */
    public function addAction(Request $request){
        
        $medecin = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Medecin')->findOneByIdMedecin('a25f1a98-8c25-11e7-bc55-0011321fa613');
        $utilisateur = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Utilisateur')->findOneByIdUtilisateur('35098050-8c11-11e7-bc55-0011321fa613');

        //var_dump($medecin);
        // $medecin = $arrayMedecin[0];
        // $utilisateur = $arrayUtilisateur[0];

        $consultation = new Consultation($medecin, $utilisateur);
		
        $consultationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Consultation');
        $attributs = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Attribut')->getAttributsByCategorieId('07dbe03c-8c19-11e7-bc55-0011321fa613');
        //$attributs = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Attribut')->getAttributsByCategorieId('feef2cbb-8bdf-11e7-a0e7-705a0f4838cf');
		
        foreach($attributs as $attribut){
                $consultationData = new ConsultationData($utilisateur);
                $consultationData->setAttribut($attribut);
                $consultationData->setCsdLink(uniqid());
                $consultationData->setConsultation($consultation);
                $consultationData->setUtilisateur($utilisateur);
                $consultation->addConsultationData($consultationData);
        }
		
        $form = $this->get('form.factory')->create(ConsultationType::class, $consultation);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->getDoctrine()->getManager()->persist($consultation);
            $this->getDoctrine()->getManager()->flush();

            
            $now = date('d/m/Y');
            $journee = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Journee')->findOneBy(['jouDate' => \DateTime::createFromFormat('d/m/Y', $now)]);
            if($journee != NULL){
                $session->getFlashBag()->add('success', 'Le nouvel consultation est bien enregistré.');
                $journee->addConsultation($consultation);
                
                $this->getDoctrine()->getManager()->persist($journee);
                $this->getDoctrine()->getManager()->flush();
                
                return $this->redirectToRoute('amuh_journee_index');
            }
            return $this->redirectToRoute('amuh_journee_add');
        }        
        
        return $this->render('AmuhBundle:Consultation:add.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/consultation/list", name="amuh_consultation_list")
     * @param Request $request
     */
    public function listAction(Request $request){
        $consultationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Consultation');
        $consultations = $consultationRepository->findAll();
        
        return $this->render('AmuhBundle:Consultation:index.html.twig', ['consultations' => $consultations]);
    }
	
	/**
     * @Route("/consultation/edit/{idConsultation}", name="amuh_consultation_edit")
     * @param Request $request
     */
    public function editAction($idConsultation, Request $request){
        $consultationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Consultation');
        $consultation = $consultationRepository->findOneBy(['idConsultation' => $idConsultation]);
        
        $form = $this->get('form.factory')->create(ConsultationType::class, $consultation);
        
        $session = $request->getSession();
        
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->getDoctrine()->getManager()->persist($consultation);
            $this->getDoctrine()->getManager()->flush();

            
            $now = date('d/m/Y');
            $journee = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Journee')->findOneBy(['jouDate' => \DateTime::createFromFormat('d/m/Y', $now)]);
            if($journee != NULL){
                $session->getFlashBag()->add('success', 'La consultation a bien été modifiée.');
                $this->getDoctrine()->getManager()->flush();
                
                return $this->redirectToRoute('amuh_journee_index');
            }
            return $this->redirectToRoute('amuh_journee_add');
        }
        return $this->render('AmuhBundle:Consultation:add.html.twig', ['form' => $form->createView(),'consultation' => $consultation]);
    }
	
	/**
     * @Route("/consultation/delete/{idConsultation}", name="amuh_consultation_delete")
     * @param Request $request
     */
    public function deleteAction($idConsultation, Request $request){
        $consultationRepository = $this->getDoctrine()->getManager()->getRepository('AmuhBundle:Consultation');
        $consultations = $consultationRepository->findAll();
        
        return $this->render('AmuhBundle:Consultation:index.html.twig', ['consultations' => $consultations]);
    }
}
