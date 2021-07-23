<?php

namespace App\Repository;

use App\Entity\ContactoFecha;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactoFecha|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactoFecha|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactoFecha[]    findAll()
 * @method ContactoFecha[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method ContactoFecha      findByCorreo(string $correo)
 */
class ContactoFechaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactoFecha::class);
    }


    /*
    public function findOneBySomeField($value): ?ContactoFecha
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
