<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InteractionRepository")
 */
class Interaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $interactionCount = 0;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBookmarked = false;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipe", inversedBy="interactions")
     */
    private $recipe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     */
    private $person;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInteractionCount(): ?int
    {
        return $this->interactionCount;
    }

    public function setInteractionCount(int $interactionCount): self
    {
        $this->interactionCount = $interactionCount;

        return $this;
    }

    public function getIsBookmarked(): ?bool
    {
        return $this->isBookmarked;
    }

    public function setIsBookmarked(bool $isBookmarked): self
    {
        $this->isBookmarked = $isBookmarked;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }
}
