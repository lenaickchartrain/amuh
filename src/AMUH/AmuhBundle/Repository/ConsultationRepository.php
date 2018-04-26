<?php

namespace AMUH\AmuhBundle\Repository;

use AMUH\AmuhBundle\Entity\ConsultationData;

class ConsultationRepository extends \Doctrine\ORM\EntityRepository
{
	public function getConsultationsWithData(){
            $queryBuilder = $this
                ->createQueryBuilder('cst')
                ->innerJoin('cst.consultationDatas', 'csd')
                ->innerJoin('cst.utilisateur', 'usr')
                ->innerJoin('cst.medecin', 'med')
                ->orderBy('cst.cstDateCreation', 'ASC');

            return $queryBuilder->getQuery()->getResult();
	}
}
