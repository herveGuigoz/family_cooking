<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Validator\IsValidAuthor;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *          "put"={
 *              "security"="is_granted('EDIT', object)",
 *              "security_message"="Seul l'autheur peut modifier cette recette"
 *          },
 *          "delete"={
 *              "security"="is_granted('EDIT', object)",
 *              "security_message"="Seul l'autheur peut supprimer cette recette"
 *          }
 *     },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "security"="is_granted('ROLE_USER')",
 *              "security_message"="Il faut etre connecté pour creer une recette"
 *          }
 *     },
 *     attributes={
 *          "pagination_items_per_page"=50
 *     },
 *     normalizationContext={"groups"={"recipe:read"}},
 *     denormalizationContext={"groups"={"recipe:write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 * @ORM\EntityListeners({"App\Doctrine\RecipeSetAuthorListener"})
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"recipe:read", "recipe:write"})
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     maxMessage="Describe your recipe in 50 chars or less"
     * )
     */
    private $title;

    /**
     * @var \DateTimeInterface date of first publication
     *
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Date
     */
    private $datePublished;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Assert\NotBlank(message = "Ingredients are missing")
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $recipeIngredient;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Assert\NotBlank(message = "Instructions are missing")
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $recipeInstruction;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message = "Preparation time is missing, your must set it to 0 or more")
     * @Assert\PositiveOrZero
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $prepTime;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message = "Cook time is missing, your must set it to 0 or more")
     * @Assert\PositiveOrZero
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $cookTime;

    /**
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Slug(fields={"title"})
     * @Groups({"recipe:read"})
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     * @IsValidAuthor()
     * @Groups({"recipe:read"})
     */
    private $Author;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Person", inversedBy="bookmarks")
     * @JoinTable(name="bookmarks")
     */
    private $bookmarks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InteractionCounter", mappedBy="recipe")
     */
    private $interactionCounters;

    public function __construct()
    {
        $this->datePublished = new \DateTimeImmutable();
        $this->bookmarks = new ArrayCollection();
        $this->interactionCounters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getRecipeIngredient()
    {
        return $this->recipeIngredient;
    }

    public function setRecipeIngredient($recipeIngredient): self
    {
        $this->recipeIngredient = $recipeIngredient;

        return $this;
    }

    public function getRecipeInstruction()
    {
        return $this->recipeInstruction;
    }

    public function setRecipeInstruction($recipeInstruction): self
    {
        $this->recipeInstruction = $recipeInstruction;

        return $this;
    }

    public function getPrepTime(): ?int
    {
        return $this->prepTime;
    }

    public function setPrepTime(int $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getCookTime(): ?int
    {
        return $this->cookTime;
    }

    public function setCookTime(int $cookTime): self
    {
        $this->cookTime = $cookTime;

        return $this;
    }

    /**
     * @Groups({"recipe:read"})
     */
    public function getTotalTime(): int
    {
        return $this->cookTime + $this->prepTime;
    }

    /**
     * How long ago in text that this recipe was added.
     *
     * @Groups({"recipe:read"})
     */
    public function getCreatedAtAgo(): string
    {
        /** @var CarbonInterface $date */
        $date = Carbon::instance($this->datePublished)->locale('fr');

        return $date->diffForHumans();
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getAuthor(): ?Person
    {
        return $this->Author;
    }

    public function setAuthor(?Person $Author): self
    {
        $this->Author = $Author;

        return $this;
    }

    /**
     * @return Collection|Person[]
     */
    public function getBookmarks(): Collection
    {
        return $this->bookmarks;
    }

    public function addBookmark(Person $bookmark): self
    {
        if (!$this->bookmarks->contains($bookmark)) {
            $this->bookmarks[] = $bookmark;
        }

        return $this;
    }

    public function removeBookmark(Person $bookmark): self
    {
        if ($this->bookmarks->contains($bookmark)) {
            $this->bookmarks->removeElement($bookmark);
        }

        return $this;
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

    /**
     *  Total of interactions for this recipe.
     *
     * @Groups({"recipe:read"})
     */
    public function getInteractionsCount(): int
    {
        $count = 0;
        $this->interactionCounters->map(static function ($interaction) use (&$count) {
            /* @var $interaction InteractionCounter */
            $count += $interaction->getInteractionCount();
        });

        return $count;
    }
}
