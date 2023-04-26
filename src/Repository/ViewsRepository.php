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

    public function findOneByMostViewedCategoryName()
    {
        $qb = $this->createQueryBuilder('v')
            ->select('v.nomCategorie AS category, COUNT(v.id) AS views')
            ->groupBy('v.nomCategorie')
            ->orderBy('views', 'DESC')
            ->setMaxResults(1);
    
        $result = $qb->getQuery()->getOneOrNullResult();
    
        return $result ? $result['category'] : null;
    }
}