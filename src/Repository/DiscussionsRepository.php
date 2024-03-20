<?php

namespace App\Repository;

use App\Entity\Discussions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Discussions>
 *
 * @method Discussions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discussions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discussions[]    findAll()
 * @method Discussions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscussionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discussions::class);
    }

//    /**
//     * @return Discussions[] Returns an array of Discussions objects
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

//    public function findOneBySomeField($value): ?Discussions
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
