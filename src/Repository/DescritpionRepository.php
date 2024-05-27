<?php

namespace App\Repository;

use App\Entity\Descritpion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Descritpion>
 *
 * @method Descritpion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Descritpion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Descritpion[]    findAll()
 * @method Descritpion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DescritpionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Descritpion::class);
    }

    //    /**
    //     * @return Descritpion[] Returns an array of Descritpion objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Descritpion
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
