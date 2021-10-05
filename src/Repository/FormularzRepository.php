<?php

namespace App\Repository;

use App\Entity\Formularz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Formularz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formularz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formularz[]    findAll()
 * @method Formularz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormularzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formularz::class);
    }

    // /**
    //  * @return Formularz[] Returns an array of Formularz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Formularz
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
