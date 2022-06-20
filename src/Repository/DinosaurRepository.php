<?php

namespace App\Repository;

use App\Entity\Dinosaur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Dinosaur>
 *
 * @method Dinosaur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dinosaur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dinosaur[]    findAll()
 * @method Dinosaur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DinosaurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dinosaur::class);
    }

    public function add(Dinosaur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Dinosaur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Dinosaur[] Returns an array of Dinosaur objects
//     */
public function dinosaurfindByLike($value): array
{
    return $this->createQueryBuilder('d')
        ->select('d.common_name', 'i.url' ,'d.id')
        ->innerJoin('d.images', 'i')
        ->andWhere('d.common_name LIKE :val')
        ->andWhere('i.main_image = true ')
        ->setParameter('val', "%$value%")
        ->orderBy('d.common_name', 'ASC')
        ->getQuery()
        ->getResult()
    ;
}

//    public function findOneBySomeField($value): ?Dinosaur
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
