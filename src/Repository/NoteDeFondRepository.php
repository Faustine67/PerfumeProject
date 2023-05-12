<?php

namespace App\Repository;

use App\Entity\NoteDeFond;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NoteDeFond>
 *
 * @method NoteDeFond|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteDeFond|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteDeFond[]    findAll()
 * @method NoteDeFond[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteDeFondRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteDeFond::class);
    }

    public function save(NoteDeFond $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NoteDeFond $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return NoteDeFond[] Returns an array of NoteDeFond objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NoteDeFond
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
