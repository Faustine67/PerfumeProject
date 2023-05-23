<?php

// namespace App\Repository;

// use App\Entity\NoteDeTete;
// use App\Entity\NoteDeCoeur;
// use App\Entity\NoteDeFond;

// use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Marque>
 *
 * @method Marque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marque[]    findAll()
 * @method Marque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
// class NotesRepository extends ServiceEntityRepository
// {
//     public function __construct(ManagerRegistry $registry)
//     {
//         parent::__construct($registry, NotedeTete::class);
//     }

//     public function save($entity, bool $flush = false): void
//     {
//         $this->getEntityManager()->persist($entity);

//         if ($flush) {
//             $this->getEntityManager()->flush();
//         }
//     }

//     public function remove($entity, bool $flush = false): void
//     {
//         $this->getEntityManager()->remove($entity);

//         if ($flush) {
//             $this->getEntityManager()->flush();
//         }
//     }

//         public function saveNoteDeCoeur(NoteDeCoeur $noteDeCoeur, bool $flush = false): void
//         {
//             $this->save($noteDeCoeur, $flush);
//         }
    
//         public function saveNoteDeFond(NoteDeFond $noteDeFond, bool $flush = false): void
//         {
//             $this->save($noteDeFond, $flush);
//         }
    
//         public function removeNoteDeCoeur(NoteDeCoeur $noteDeCoeur, bool $flush = false): void
//         {
//             $this->remove($noteDeCoeur, $flush);
//         }
    
//         public function removeNoteDeFond(NoteDeFond $noteDeFond, bool $flush = false): void
//         {
//             $this->remove($noteDeFond, $flush);
//         }



//    /**
//     * @return Marque[] Returns an array of Marque objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Marque
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
// }