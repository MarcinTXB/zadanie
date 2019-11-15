<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GenusNote|null find($id, $lockMode = null, $lockVersion = null)
 * @method GenusNote|null findOneBy(array $criteria, array $orderBy = null)
 * @method GenusNote[]    findAll()
 * @method GenusNote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    // /**
    //  * @return GenusNote[] Returns an array of GenusNote objects
    //  */
    
    public function findByTemat($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.temat = :val')
            ->setParameter('val', $value)
            //->orderBy('p.nazwa', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?GenusNote
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    
    
    /*
    public function findAll(): ?TematPost
    {
        return $this->createQueryBuilder('t')        
        ->getQuery()
        ->getResult()
        ;
    }
    */
    
}
