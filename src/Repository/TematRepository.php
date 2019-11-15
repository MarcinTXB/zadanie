<?php

namespace App\Repository;

use App\Entity\Temat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Genus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genus[]    findAll()
 * @method Genus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TematRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Temat::class);
    }

    // /**
    //  * @return Genus[] Returns an array of Genus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Genus
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function findAllOrdered(): array
    {   
        return $this->createQueryBuilder('t')
            ->addOrderBy('t.name', 'ASC')
            ->getQuery()
            ->getResult()     // zwraca tablice
                                                //  getOneOrNullResult()        zwraca encję albo null
                                                //  getSingleScalarResult()     jednoliczbowa wartość                   
        ;
    }
    
    
}




