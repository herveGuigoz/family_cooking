<?php

namespace App\Doctrine;

use App\Entity\Person;
use App\Entity\Recipe;
use Symfony\Component\Security\Core\Security;

class RecipeSetAuthorListener
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function prePersist(Recipe $recipe): void
    {
        if ($recipe->getAuthor()) {
            return;
        }

        if ($this->security->getUser()) {
            /** @var Person $person */
            $person = $this->security->getUser();
            $recipe->setAuthor($person);
        }
    }
}
