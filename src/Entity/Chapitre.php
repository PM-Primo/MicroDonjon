<?php

namespace App\Entity;

use App\Repository\ChapitreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapitreRepository::class)
 */
class Chapitre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreChapitre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typePage;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="chapitres")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Zone::class, inversedBy="chapitres")
     */
    private $zone;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreChapitre(): ?string
    {
        return $this->titreChapitre;
    }

    public function setTitreChapitre(?string $titreChapitre): self
    {
        $this->titreChapitre = $titreChapitre;

        return $this;
    }

    public function getTypePage(): ?string
    {
        return $this->typePage;
    }

    public function setTypePage(string $typePage): self
    {
        $this->typePage = $typePage;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addChapitre($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeChapitre($this);
        }

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getIdPlusTitle()
    {
        return $this->id.' - '.$this->titreChapitre;
    }
}
