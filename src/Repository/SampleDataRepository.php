<?php

namespace App\Repository;

use App\Entity\SampleData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SampleData|null find($id, $lockMode = null, $lockVersion = null)
 * @method SampleData|null findOneBy(array $criteria, array $orderBy = null)
 * @method SampleData[]    findAll()
 * @method SampleData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SampleDataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SampleData::class);
    }

    // /**
    //  * @return SampleData[] Returns an array of SampleData objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SampleData
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
