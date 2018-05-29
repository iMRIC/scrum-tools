<?php

namespace App\Repository;

use App\Entity\TweetMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TweetMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TweetMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TweetMessage[]    findAll()
 * @method TweetMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TweetMessageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TweetMessage::class);
    }

//    /**
//     * @return TweetMessage[] Returns an array of TweetMessage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TweetMessage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
