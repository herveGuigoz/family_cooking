<?php


namespace App\Manager;


use App\Entity\Interaction;
use App\Entity\Person;
use App\Entity\Recipe;
use App\Repository\InteractionRepository;

class InteractionManager
{
    private $interactionRepository;

    public function __construct(InteractionRepository $interactionRepository)
    {
        $this->interactionRepository = $interactionRepository;
    }

    public function bookmarkMe(Person $person, Recipe $recipe): Interaction
    {
        $interaction = $this->interactionRepository->findOneByUserIdAndRecipeId($person, $recipe);

        if (!$interaction instanceof Interaction) {
            $interaction = new Interaction();
            $interaction->setPerson($person);
            $interaction->setRecipe($recipe);
        }

        $interaction->setIsBookmarked(!$interaction->getIsBookmarked());
        $this->interactionRepository->save($interaction);

        return $interaction;
    }

    public function handleLove(Person $person, Recipe $recipe, int $count): Interaction
    {
        $interaction = $this->interactionRepository->findOneByUserIdAndRecipeId($person, $recipe);

        if (!$interaction instanceof Interaction) {
            $interaction = new Interaction();
            $interaction->setPerson($person);
            $interaction->setRecipe($recipe);
        }

        $interaction->setInteractionCount($count + $interaction->getInteractionCount() > 100 ? 100 : $interaction->getInteractionCount() + $count);
        $this->interactionRepository->save($interaction);

        return $interaction;
    }
}
