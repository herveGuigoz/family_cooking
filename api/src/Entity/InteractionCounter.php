<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InteractionCounterRepository")
 */
class InteractionCounter
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
    private $interactionCount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     */
    private $person;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipe", inversedBy="interactionCounters")
     */
    private $recipe;

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

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

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
}
