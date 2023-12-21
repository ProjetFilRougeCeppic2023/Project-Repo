<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Movie>
 *
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }


    public function getRecentMovies(){
        $results = $this->createQueryBuilder('m')
            ->orderBy('m.CreationDate', 'DESC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();
        return $results;
    }


    /**
     * Recherche des films par nom.
     *
     * @param string $name
     * @return array
     */
    public function findByName(string $name, string $order = 'DESC')
    {
        $results = $this->createQueryBuilder('m')
            ->where('m.name LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->orderBy('m.CreationDate', $order)
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();
        return $results;
    }
}
