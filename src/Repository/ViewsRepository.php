<?php

namespace App\Repository;

use App\Entity\Views;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ViewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Views::class);
    }

    public function getMostViewedCategory()
    {
        $qb = $this->createQueryBuilder('v')
            ->select('c.nom, COUNT(v.id) AS views')
            ->leftJoin('v.nomCategorie', 'c')
            ->groupBy('c.id')
            ->orderBy('views', 'DESC')
            ->setMaxResults(1);

        return $qb->getQuery()->getSingleResult();
    }
}