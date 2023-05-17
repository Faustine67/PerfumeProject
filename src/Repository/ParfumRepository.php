<?php

namespace App\Repository;

use App\Entity\Parfum;
use App\Model\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Parfum>
 *
 * @method Parfum|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parfum|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parfum[]    findAll()
 * @method Parfum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParfumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parfum::class);
    }

    public function save(Parfum $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Parfum $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Parfum[] Returns an array of Parfum objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Parfum
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

//Recuperer les produits en lien avec une recherche

    public function findSearch(SearchData $search):array
    {
        $query =$this->createQueryBuilder('p');
        // ->join('p.marques','m');
    return $query->getQuery()->getResult();
    }
}
