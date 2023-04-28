<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomItem;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageItem;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="inventaire")
     */
    private $possesseurs;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionItem;

    public function __construct()
    {
        $this->possesseurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomItem(): ?string
    {
        return $this->nomItem;
    }

    public function setNomItem(string $nomItem): self
    {
        $this->nomItem = $nomItem;

        return $this;
    }

    public function getImageItem(): ?string
    {
        return $this->imageItem;
    }

    public function setImageItem(?string $imageItem): self
    {
        $this->imageItem = $imageItem;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getPossesseurs(): Collection
    {
        return $this->possesseurs;
    }

    public function addPossesseur(User $possesseur): self
    {
        if (!$this->possesseurs->contains($possesseur)) {
            $this->possesseurs[] = $possesseur;
            $possesseur->addInventaire($this);
        }

        return $this;
    }

    public function removePossesseur(User $possesseur): self
    {
        if ($this->possesseurs->removeElement($possesseur)) {
            $possesseur->removeInventaire($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomItem;
    }

    public function getDescriptionItem(): ?string
    {
        return $this->descriptionItem;
    }

    public function setDescriptionItem(?string $descriptionItem): self
    {
        $this->descriptionItem = $descriptionItem;

        return $this;
    }
}
