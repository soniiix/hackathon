<?php

namespace App\Repository;

use App\Entity\InscriptionHackathon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InscriptionHackathon>
 *
 * @method InscriptionHackathon|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionHackathon|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionHackathon[]    findAll()
 * @method InscriptionHackathon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionHackathonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionHackathon::class);
    }

//    /**
//     * @return InscriptionHackathon[] Returns an array of InscriptionHackathon objects
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

//    public function findOneBySomeField($value): ?InscriptionHackathon
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
