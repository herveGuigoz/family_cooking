<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Validator\IsValidAuthor;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
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
 *     shortName="recipe",
 *     attributes={
 *          "pagination_items_per_page"=50
 *     }
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
     * @ORM\Column(type="string", length=255)
     * @Gedmo\Slug(fields={"title"})
     * @Groups({"recipe:read"})
     */
    private $slug;

    /**
     * @ORM\Column(type="date", nullable=false)
     * @Assert\Date
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Assert\NotBlank(message = "Ingredients are missing")
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $recipeIngredients = [];

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Assert\NotBlank(message = "Instructions are missing")
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $recipeInstructions = [];

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message = "Preparation time is missing, your must set it to 0 or more")
     * @Assert\PositiveOrZero(message="Le temps de préparation ne peut pas être inférieur à 0")
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $prepTime;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message = "Cook time is missing, your must set it to 0 or more")
     * @Assert\PositiveOrZero(message="Le temps de cuisson ne peut pas être inférieur à 0")
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $cookTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     * @IsValidAuthor()
     * @Groups({"recipe:read"})
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Interaction", mappedBy="recipe", orphanRemoval=true)
     */
    private $interactions;

    public function __construct()
    {
        $this->publishedAt = new \DateTimeImmutable();
        $this->interactions = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * How long ago in text that this recipe was added.
     *
     * @Groups({"recipe:read"})
     */
    public function getPublishedAt(): string
    {
        /** @var CarbonInterface $date */
        $date = Carbon::instance($this->publishedAt)->locale('fr');

        return $date->diffForHumans();
    }

    public function getRecipeIngredients(): ?array
    {
        return $this->recipeIngredients;
    }

    public function setRecipeIngredients(array $recipeIngredients): self
    {
        $this->recipeIngredients = $recipeIngredients;

        return $this;
    }

    public function getRecipeInstructions(): ?array
    {
        return $this->recipeInstructions;
    }

    public function setRecipeInstructions(array $recipeInstructions): self
    {
        $this->recipeInstructions = $recipeInstructions;

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

    public function getAuthor(): ?Person
    {
        return $this->author;
    }

    public function setAuthor(?Person $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|Interaction[]
     */
    public function getInteractions(): Collection
    {
        return $this->interactions;
    }

    public function addInteraction(Interaction $interaction): self
    {
        if (!$this->interactions->contains($interaction)) {
            $this->interactions[] = $interaction;
            $interaction->setRecipe($this);
        }

        return $this;
    }

    public function removeInteraction(Interaction $interaction): self
    {
        if ($this->interactions->contains($interaction)) {
            $this->interactions->removeElement($interaction);
            // set the owning side to null (unless already changed)
            if ($interaction->getRecipe() === $this) {
                $interaction->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     *  Total of interactions for this recipe.
     *
     * @Groups({"recipe:read"})
     */
    public function getTotalInteractionsCount(): int
    {
        $count = 0;
        $this->interactions->map(static function ($interaction) use (&$count) {
            /* @var $interaction Interaction */
            $count += (int) $interaction->getInteractionCount();
        });

        return $count;
    }
}
