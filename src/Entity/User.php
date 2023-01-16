<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

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
     * @ORM\Column(type="string", length=50)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="integer")
     */
    private $PVmax;

    /**
     * @ORM\Column(type="integer")
     */
    private $PVactuels;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gold;

    /**
     * @ORM\Column(type="integer")
     */
    private $attaque;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chapitreEnCours;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateVictoire;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPVmax(): ?int
    {
        return $this->PVmax;
    }

    public function setPVmax(int $PVmax): self
    {
        $this->PVmax = $PVmax;

        return $this;
    }

    public function getPVactuels(): ?int
    {
        return $this->PVactuels;
    }

    public function setPVactuels(int $PVactuels): self
    {
        $this->PVactuels = $PVactuels;

        return $this;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(?int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getAttaque(): ?int
    {
        return $this->attaque;
    }

    public function setAttaque(int $attaque): self
    {
        $this->attaque = $attaque;

        return $this;
    }

    public function getChapitreEnCours(): ?int
    {
        return $this->chapitreEnCours;
    }

    public function setChapitreEnCours(?int $chapitreEnCours): self
    {
        $this->chapitreEnCours = $chapitreEnCours;

        return $this;
    }

    public function getDateVictoire(): ?\DateTimeInterface
    {
        return $this->dateVictoire;
    }

    public function setDateVictoire(?\DateTimeInterface $dateVictoire): self
    {
        $this->dateVictoire = $dateVictoire;

        return $this;
    }
}
