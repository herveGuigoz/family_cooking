<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @see http://schema.org/Recipe Documentation on Schema.org
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Recipe")
 */
class Recipe
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
     * @var int|null The time it takes to actually cook the dish, in \[ISO 8601 duration format\](http://en.wikipedia.org/wiki/ISO\_8601).
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/cookTime")
     */
    private $cookTime;

    /**
     * @var string|null the category of the recipe—for example, appetizer, entree, etc
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/recipeCategory")
     */
    private $recipeCategory;

    /**
     * @var int|null The length of time it takes to prepare the items to be used in instructions or a direction, in \[ISO 8601 duration format\](http://en.wikipedia.org/wiki/ISO\_8601).
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/prepTime")
     */
    private $prepTime;

    /**
     * @var int|null The total time required to perform instructions or a direction (including time to prepare the supplies), in \[ISO 8601 duration format\](http://en.wikipedia.org/wiki/ISO\_8601).
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/totalTime")
     */
    private $totalTime;

    /**
     * @var \DateTimeInterface|null date of first broadcast/publication
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/datePublished")
     * @Assert\Date
     */
    private $datePublished;

    /**
     * @var string|null A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/recipeIngredient")
     */
    private $recipeIngredient;

    /**
     * @var string|null A step in making the recipe, in the form of a single item (document, video, etc.) or an ordered list with HowToStep and/or HowToSection items.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/recipeInstructions")
     */
    private $recipeInstruction;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InteractionCounter", mappedBy="recipe")
     */
    private $interactionCounters;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="recipes")
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="bookmarked")
     * @JoinTable(name="users_bookmarks")
     */
    private $bookmark;

    public function __construct()
    {
        $this->interactionCounters = new ArrayCollection();
        $this->bookmark = new ArrayCollection();
    }

    public function setCookTime(?int $cookTime): void
    {
        $this->cookTime = $cookTime;
    }

    public function getCookTime(): ?int
    {
        return $this->cookTime;
    }

    public function setRecipeCategory(?string $recipeCategory): void
    {
        $this->recipeCategory = $recipeCategory;
    }

    public function getRecipeCategory(): ?string
    {
        return $this->recipeCategory;
    }

    public function setPrepTime(?int $prepTime): void
    {
        $this->prepTime = $prepTime;
    }

    public function getPrepTime(): ?int
    {
        return $this->prepTime;
    }

    public function setTotalTime(?int $totalTime): void
    {
        $this->totalTime = $totalTime;
    }

    public function getTotalTime(): ?int
    {
        return $this->totalTime;
    }


    public function setDatePublished(?\DateTimeInterface $datePublished): void
    {
        $this->datePublished = $datePublished;
    }

    public function getDatePublished(): ?\DateTimeInterface
    {
        return $this->datePublished;
    }

    public function setRecipeIngredient(?string $recipeIngredient): void
    {
        $this->recipeIngredient = $recipeIngredient;
    }

    public function getRecipeIngredient(): ?string
    {
        return $this->recipeIngredient;
    }

    public function setRecipeInstruction(?string $recipeInstruction): void
    {
        $this->recipeInstruction = $recipeInstruction;
    }

    public function getRecipeInstruction(): ?string
    {
        return $this->recipeInstruction;
    }

    /**
     * @return Collection|InteractionCounter[]
     */
    public function getInteractionCounters(): Collection
    {
        return $this->interactionCounters;
    }

    public function addInteractionCounter(InteractionCounter $interactionCounter): self
    {
        if (!$this->interactionCounters->contains($interactionCounter)) {
            $this->interactionCounters[] = $interactionCounter;
            $interactionCounter->setRecipe($this);
        }

        return $this;
    }

    public function removeInteractionCounter(InteractionCounter $interactionCounter): self
    {
        if ($this->interactionCounters->contains($interactionCounter)) {
            $this->interactionCounters->removeElement($interactionCounter);
            // set the owning side to null (unless already changed)
            if ($interactionCounter->getRecipe() === $this) {
                $interactionCounter->setRecipe(null);
            }
        }

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

    /**
     * @return Collection|User[]
     */
    public function getBookmark(): Collection
    {
        return $this->bookmark;
    }

    public function addBookmark(User $bookmark): self
    {
        if (!$this->bookmark->contains($bookmark)) {
            $this->bookmark[] = $bookmark;
        }

        return $this;
    }

    public function removeBookmark(User $bookmark): self
    {
        if ($this->bookmark->contains($bookmark)) {
            $this->bookmark->removeElement($bookmark);
        }

        return $this;
    }
}
