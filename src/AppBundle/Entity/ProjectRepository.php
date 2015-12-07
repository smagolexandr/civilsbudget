<?php

namespace AppBundle\Entity;

/**
 * ProjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectRepository extends \Doctrine\ORM\EntityRepository
{
    public function getProject()
    {
        $qb = $this->getEntityManager()->createQueryBuilder('d');
        $qb
            ->select('d')
            ->from('AppBundle:Project', 'd')
            ->addSelect('COUNT(m.id) as nMethods')
            ->join('d.likedUsers', 'm')
            ->join('m.location', 'l')
            ->where('l.city = :identifier')
            ->setParameter('identifier', 'ЧЕРКАСИ')
            ->groupBy('d.id')
            ->orderBy("nMethods", 'DESC')

            ->getQuery()
            ->getResult()
        ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
}
