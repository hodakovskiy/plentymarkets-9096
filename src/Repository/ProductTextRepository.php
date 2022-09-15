<?php

namespace App\Repository;

use App\Entity\ProductText;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductText>
 *
 * @method ProductText|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductText|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductText[]    findAll()
 * @method ProductText[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductTextRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductText::class);
    }

    public function add(ProductText $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProductText $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @param int $id
     * @param string $lang
     * 
     * @return ProductText
     */
    public function findTextLanguage($id, $lang)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.product = :id')
            ->andWhere('p.lang = :lang')
            ->setParameter('id', $id)
            ->setParameter('lang', $lang)
            ->setMaxResults(1)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param int $id
     * @param string $lang
     * 
     * @return ProductTexts
     * 
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    
    public function findTexts($id, $lang)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.product = :id')
            ->andWhere('p.lang = :lang')
            ->setParameter('id', $id)
            ->setParameter('lang', $lang)
            ->getQuery();

        return $query->getResult();
    }

//    /**
//     * @return ProductText[] Returns an array of ProductText objects
//     */
//    public function findB     yExampleField($value): array
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

//    public function findOneBySomeField($value): ?ProductText
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
