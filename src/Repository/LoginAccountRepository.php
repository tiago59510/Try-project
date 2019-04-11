<?php

namespace App\Repository;

use App\Entity\LoginAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LoginAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginAccount[]    findAll()
 * @method LoginAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginAccountRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LoginAccount::class);
    }

    // /**
    //  * @return LoginAccount[] Returns an array of LoginAccount objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginAccount
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
