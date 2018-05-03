<?php

namespace App\Repository;

use App\Entity\TweetLike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TweetLike|null find($id, $lockMode = null, $lockVersion = null)
 * @method TweetLike|null findOneBy(array $criteria, array $orderBy = null)
 * @method TweetLike[]    findAll()
 * @method TweetLike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TweetLikeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TweetLike::class);
    }

//    /**
//     * @return TweetLike[] Returns an array of TweetLike objects
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
    public function findOneBySomeField($value): ?TweetLike
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
