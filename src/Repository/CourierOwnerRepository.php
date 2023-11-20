<?php

namespace App\Repository;

use App\Entity\CourierOwner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourierOwner>
 *
 * @method CourierOwner|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourierOwner|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourierOwner[]    findAll()
 * @method CourierOwner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourierOwnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourierOwner::class);
    }

//    /**
//     * @return CourierOwner[] Returns an array of CourierOwner objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CourierOwner
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
