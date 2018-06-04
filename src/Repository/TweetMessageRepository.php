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
}
