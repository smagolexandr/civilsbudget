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
    public function getProjectStat()
    {
        $qb = $this->getEntityManager()->createQueryBuilder('d');
        $qb
            ->select('d')
            ->from('AppBundle:Project', 'd')
            ->addSelect('COUNT(m.id) as nMethods')
            ->join('d.likedUsers', 'm')
            ->join('m.location', 'l')
            ->where($qb->expr()->like('l.city', $qb->expr()->literal('%ЧЕРКАС%')))
            ->groupBy('d.id')
            ->orderBy("nMethods", 'DESC')

            ->getQuery()
            ->getResult()
        ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function getProjectShow()
    {
        $qb = $this->getEntityManager()->createQueryBuilder('d');
        $qb
            ->select('d')
            ->from('AppBundle:Project', 'd')
            ->addSelect('COUNT(m.id) as nMethods')
            ->join('d.likedUsers', 'm')
            ->join('m.location', 'l')
            ->where('d.confirm = :confirm')
            ->andWhere($qb->expr()->like('l.city', $qb->expr()->literal('%ЧЕРКАС%')))
            ->setParameter('confirm', 'approved')
            ->groupBy('d.id')

            ->getQuery()
            ->getResult()
        ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function getOneProjectShow($id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder('d');
        $qb
            ->select('d')
            ->from('AppBundle:Project', 'd')
            ->addSelect('COUNT(m.id) as nMethods')
            ->join('d.likedUsers', 'm')
            ->join('m.location', 'l')
            ->where('d.confirm = :confirm')
            ->andWhere('d.id = :id')
            ->andWhere($qb->expr()->like('l.city', $qb->expr()->literal('%ЧЕРКАС%')))
            ->setParameter('confirm', 'approved')
            ->setParameter('id', $id)
            ->groupBy('d.id')

            ->getQuery()
            ->getResult()
        ;
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }
}
