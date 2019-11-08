<?php

namespace App\Repository;

use App\Entity\InteractionCounter;
use App\Entity\Person;
use App\Entity\Recipe;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InteractionCounter|null find($id, $lockMode = null, $lockVersion = null)
 * @method InteractionCounter|null findOneBy(array $criteria, array $orderBy = null)
 * @method InteractionCounter[]    findAll()
 * @method InteractionCounter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InteractionCounterRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InteractionCounter::class);
    }

    public function findOneByUserIdAndRecipeId(Person $user, Recipe $recipe): ?InteractionCounter
    {
        return $this->createQueryBuilder('i')
            ->leftJoin('i.person', 'person')
            ->leftJoin('i.recipe', 'recipe')
            ->andWhere('person.id = :personId')
            ->andWhere('recipe.id = :recipeId')
            ->setParameter('personId', $user->getId())
            ->setParameter('recipeId', $recipe->getId())
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // /**
    //  * @return InteractionCounter[] Returns an array of InteractionCounter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InteractionCounter
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
