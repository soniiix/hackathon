<?php

namespace App\Repository;

use App\Entity\InscriptionAtelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InscriptionAtelier>
 *
 * @method InscriptionAtelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionAtelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionAtelier[]    findAll()
 * @method InscriptionAtelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionAtelierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionAtelier::class);
    }

//    /**
//     * @return InscriptionAtelier[] Returns an array of InscriptionAtelier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InscriptionAtelier
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
