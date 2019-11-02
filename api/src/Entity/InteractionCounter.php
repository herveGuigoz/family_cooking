<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A summary of how users have interacted with this CreativeWork. In most cases, authors will use a subtype to specify the specific type of interaction.
 *
 * @see http://schema.org/InteractionCounter Documentation on Schema.org
 *
 * @ORM\Entity
 */
class InteractionCounter
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $interactionCount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recipe", inversedBy="interactionCounters")
     */
    private $recipe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="interactionCounters")
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setInteractionCount(int $interactionCount): void
    {
        $this->interactionCount = $interactionCount;
    }

    public function getInteractionCount(): int
    {
        return $this->interactionCount;
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

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
