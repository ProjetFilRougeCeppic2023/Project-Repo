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


    public function getRecentMovies()
    {
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
    public function findByName(string $name, string $order, ?array $tags)
    {
        $qb = $this->createQueryBuilder('m');
    
        // Ajouter la condition WHERE pour le nom
        $qb->where('m.name LIKE :name')
            ->setParameter('name', '%' . $name . '%');
    
        // Si des tags sont fournis, ajouter une jointure avec la table des tags
        if (!empty($tags)) {
            $qb->join('m.tags', 't');
            // Ajouter une condition pour que tous les tags soient présents
            foreach ($tags as $index => $tagId) {
                $parameterName = 'tag_id_' . $index;
                $qb->andWhere(":$parameterName MEMBER OF m.tags")
                    ->setParameter($parameterName, $tagId);
            }
        }
    
        // Ajouter l'ordre et la limite
        $results = $qb->orderBy('m.CreationDate', $order)
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();
    
        return $results;
    }
}
