<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(
 *      fields={"email"},
 *      message= "Un utilisateur uilise daja l'adresse mail '{{ value }}'"
 *  )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message="Il vous faut renseigner un email")
     * @Assert\Email(message = "Cet email:  '{{ value }}' n'est pas valide.")
     * @Assert\Unique(message= "Un utilisateur uilise daja l'adresse mail '{{ value }}'")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Unique(message= "Un utilisateur uilise daja le surnom '{{ value }}'")
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string")
     * @Assert\Choice(choices=User::AVATAR_NAMES, message="Choose a valid avatar.")
     */
    private $avatar;

    public const AVATAR_NAMES = [
        'moustache',
        'baby',
        'darthVader',
        'futuramaAmy',
        'futuramaBender',
        'futuramaFry',
        'futuramaHermes',
        'futuramaLeela',
        'futuramaMom',
        'futuramaNibbler',
        'futuramaProfessor',
        'futuramaZoidberg',
        'homerSimpson',
        'ironMan',
        'mermaid',
        'naruto',
        'pennywise',
        'r2d2',
        'songoku',
        'stich',
        'stormtrooper',
        'superMario',
        'unicorn',
        'walterwhite',
    ];

    public function getId(): ?int
    {
        return $this->id;
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

    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
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
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt(): self
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}
