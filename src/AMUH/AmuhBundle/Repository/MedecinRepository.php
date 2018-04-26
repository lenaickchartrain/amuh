<?php

namespace AMUH\AmuhBundle\Repository;

use AMUH\AmuhBundle\Entity\Medecin;
use AMUH\AmuhBundle\Repository\JourneeRepository;

class MedecinRepository extends \Doctrine\ORM\EntityRepository{
    //put your code here
    public function getMedecinsTodayQueryBuilder(){
        $now = date('d/m/Y');
        $dateDuJour = \DateTime::createFromFormat('d/m/Y', $now);
        
        $journeeMetadata = new \Doctrine\ORM\Mapping\ClassMetadata('AmuhBundle:Journee');
        $journeeRepository = new JourneeRepository($this->_em, $journeeMetadata);
        $journee = $journeeRepository->findOneBy(['jouDate' => $dateDuJour]);
        if($journee === NULL){
            return;
        }
        $queryBuilder = $this
            ->createQueryBuilder('med')
            ->leftJoin('med.journees', 'jmed')
            ->where('jmed.idJournee = :id_journee')
            ->setParameter('id_journee', $journee->getIdJournee());
			
        return $queryBuilder;
    }
    
    public function getMedecinsByDayQueryBuilder($dateDuJour){
        $journeeMetadata = new \Doctrine\ORM\Mapping\ClassMetadata('AmuhBundle:Journee');
        $journeeRepository = new JourneeRepository($this->_em, $journeeMetadata);
        $journee = $journeeRepository->findOneBy(['jouDate' => $dateDuJour]);
        if($journee === NULL){
            return;
        }
        $queryBuilder = $this
            ->createQueryBuilder('med')
            ->leftJoin('med.journees', 'jmed')
            ->where('jmed.idJournee = :id_journee')
            ->setParameter('id_journee', $journee->getIdJournee());
			
        return $queryBuilder;
    }
    
    public function getMedecinsToday(){
        $now = date('d/m/Y');
        $dateDuJour = \DateTime::createFromFormat('d/m/Y', $now);
        
        $journeeMetadata = new \Doctrine\ORM\Mapping\ClassMetadata('AmuhBundle:Journee');
        $journeeRepository = new JourneeRepository($this->_em, $journeeMetadata);
        $journee = $journeeRepository->findOneBy(['jouDate' => $dateDuJour]);
        if($journee === NULL){
            return;
        }
        $queryBuilder = $this
            ->createQueryBuilder('med')
            ->leftJoin('med.journees', 'jmed')
            ->where('jmed.idJournee = :id_journee')
            ->setParameter('id_journee', $journee->getIdJournee());
			
        return $queryBuilder->getQuery()->getResult();
    }
}
