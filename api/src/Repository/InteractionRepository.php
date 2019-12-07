<?php

namespace App\Repository;

use App\Entity\Interaction;
use App\Entity\Person;
use App\Entity\Recipe;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Interaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Interaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Interaction[]    findAll()
 * @method Interaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InteractionRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Interaction::class);
    }

    public function findOneByUserIdAndRecipeId(Person $user, Recipe $recipe): ?Interaction
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
}
