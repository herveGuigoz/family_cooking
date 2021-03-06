<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     shortName="person",
 *     accessControl="is_granted('ROLE_USER')",
 *     collectionOperations={
 *          "get"={"security"="is_granted('ROLE_ADMIN')"},
 *          "post"={
 *              "security"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')",
 *              "validation_groups"={"Default", "create"}
 *          },
 *     },
 *     itemOperations={
 *          "get"={"security"="is_granted('ROLE_ADMIN')"},
 *          "put"={
 *              "security"="is_granted('ROLE_USER') and object == user",
 *              "validation_groups"={"Default", "update"}
 *          },
 *          "delete"={"security"="is_granted('ROLE_ADMIN')"}
 *     }
 * )
 * @UniqueEntity(
 *      fields={"email"},
 *      message= "Un utilisateur uilise daja l'adresse mail '{{ value }}'"
 *  )
 * @UniqueEntity(
 *      fields={"username"},
 *      message= "Un utilisateur uilise daja '{{ value }}'"
 *  )
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"admin:read", "person:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(groups={"create"}, message="Il vous faut renseigner un nom d'utilisateur")
     * @Groups({"admin:read", "recipe:read", "person:collection:post"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(groups={"create", "update"}, message="Il vous faut renseigner un email")
     * @Assert\Email(groups={"create", "update"}, message = "Cet email:  '{{ value }}' n'est pas valide.")
     * @Groups({"admin:read", "person:collection:post", "person:item:put"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Choice(choices=Person::AVATAR_NAMES, message="Choose a valid avatar.")
     * @Assert\NotBlank(groups={"update"})
     * @Groups({"admin:read", "person:item:put"})
     */
    private $avatar;

    /**
     * @ORM\Column(type="json")
     * @Groups({"admin:read", "admin:write"})
     */
    private $roles = [];

    /**
     * Not stored in db. Used in PersonDataPersister.
     *
     * @Groups("person:write")
     * @Assert\NotBlank(groups={"create"}, message="Veuillez renseigner un mot de passe")
     * @Assert\Length(
     *     groups={"create", "update"},
     *     min = 6,
     *     max = 50,
     *     minMessage = "Votre mot de passe doit contenir {{ limit }} characteres minimum",
     *     maxMessage = "Votre mot de passe doit contenir {{ limit }} characteres maximum"
     * )
     * @SerializedName("password")
     */
    private $plainPassword;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"admin:read"})
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recipe", mappedBy="author", orphanRemoval=true)
     */
    private $recipes;

    public const AVATAR_NAMES = [
        'moustache',
        'baby',
        'darthvader',
        'futuramaamy',
        'futuramabender',
        'futuramafry',
        'futuramahermes',
        'futuramaleela',
        'futuramamom',
        'futuramanibbler',
        'futuramaprofessor',
        'futuramazoidberg',
        'homersimpson',
        'ironman',
        'mermaid',
        'naruto',
        'pennywise',
        'r2d2',
        'songoku',
        'stich',
        'stormtrooper',
        'supermario',
        'unicorn',
        'walterwhite',
    ];

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): self
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes[] = $recipe;
            $recipe->setAuthor($this);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): self
    {
        if ($this->recipes->contains($recipe)) {
            $this->recipes->removeElement($recipe);
            // set the owning side to null (unless already changed)
            if ($recipe->getAuthor() === $this) {
                $recipe->setAuthor(null);
            }
        }

        return $this;
    }
}
