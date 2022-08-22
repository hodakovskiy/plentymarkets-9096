<?php

namespace App\Repository;

use App\Entity\Variations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Variations>
 *
 * @method Variations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Variations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Variations[]    findAll()
 * @method Variations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Variations::class);
    }

    public function findProductVariation($productId)
    {
        return $this->findBy(['product' => $productId]);
    }

    public function add(Variations $entity, bool $flush = false): void
    {
      
        $this->getEntityManager()->persist($entity);
  
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function saveAll(array $entities, bool $flush = false): void
    {
        
        foreach ($entities as $entity) {
         
            $this->add($entity, $flush);
        }

    }

    public function remove(Variations $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


}
