<?php

namespace App\Repository;

use App\Entity\NoteDeCoeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NoteDeCoeur>
 *
 * @method NoteDeCoeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteDeCoeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteDeCoeur[]    findAll()
 * @method NoteDeCoeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteDeCoeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteDeCoeur::class);
    }

    public function save(NoteDeCoeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NoteDeCoeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return NoteDeCoeur[] Returns an array of NoteDeCoeur objects
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

//    public function findOneBySomeField($value): ?NoteDeCoeur
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
