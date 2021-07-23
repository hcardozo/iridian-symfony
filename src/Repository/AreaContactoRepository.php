<?php

namespace App\Repository;

use App\Entity\AreaContacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AreaContacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method AreaContacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method AreaContacto[]    findAll()
 * @method AreaContacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AreaContactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AreaContacto::class);
    }

    /*
    public function findOneBySomeField($value): ?AreaContacto
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
