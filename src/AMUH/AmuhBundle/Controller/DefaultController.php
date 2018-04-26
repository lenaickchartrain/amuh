<?php

namespace AMUH\AmuhBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        //Type de journée (JEP, WeekEnd, Petite Nuit)
        //return $this->render('AmuhBundle:Default:index.html.twig');
        
        return $this->redirectToRoute('amuh_journee_index');
    }
}
