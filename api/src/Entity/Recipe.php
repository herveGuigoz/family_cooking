<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"recipe:read"}},
 *     denormalizationContext={"groups"={"recipe:write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
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
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="recipes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $Author;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true}, nullable=false)
     * @Groups({"recipe:read", "recipe:write"})
     */
    private $recipeIngredient;

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

    public function getAuthor(): ?Person
    {
        return $this->Author;
    }

    public function setAuthor(?Person $Author): self
    {
        $this->Author = $Author;

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
}
