<?php

namespace App\Repository;

use App\Entity\Sprint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sprint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sprint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sprint[]    findAll()
 * @method Sprint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SprintRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sprint::class);
    }
}
