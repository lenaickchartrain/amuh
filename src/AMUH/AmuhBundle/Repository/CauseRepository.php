<?php

namespace AMUH\AmuhBundle\Repository;

/**
 * CauseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CauseRepository extends \Doctrine\ORM\EntityRepository
{
    public function getActivesCauses(){
        $queryBuilder = $this->createQueryBuilder('cau')
                ->where('cauEtat = :etat')
                ->setParameter(':etat', 'ACTIF');
        
        return $queryBuilder->getQuery()->getResult();
    }
}
