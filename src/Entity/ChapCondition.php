<?php

namespace App\Entity;

use App\Repository\ChapConditionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapConditionRepository::class)
 */
class ChapCondition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $texteSiVrai;

    /**
     * @ORM\Column(type="text")
     */
    private $texteSiFaux;

    /**
     * @ORM\OneToMany(targetEntity=SortieCondition::class, mappedBy="chapCondition", orphanRemoval=true)
     */
    private $sorties;

    /**
     * @ORM\OneToOne(targetEntity=Chapitre::class, cascade={"persist", "remove"})
     */
    private $chapitre;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     */
    private $itemCondition;

    public function __construct()
    {
        $this->sorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteSiVrai(): ?string
    {
        return $this->texteSiVrai;
    }

    public function setTexteSiVrai(string $texteSiVrai): self
    {
        $this->texteSiVrai = $texteSiVrai;

        return $this;
    }

    public function getTexteSiFaux(): ?string
    {
        return $this->texteSiFaux;
    }

    public function setTexteSiFaux(string $texteSiFaux): self
    {
        $this->texteSiFaux = $texteSiFaux;

        return $this;
    }

    /**
     * @return Collection<int, SortieCondition>
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function addSorty(SortieCondition $sorty): self
    {
        if (!$this->sorties->contains($sorty)) {
            $this->sorties[] = $sorty;
            $sorty->setChapCondition($this);
        }

        return $this;
    }

    public function removeSorty(SortieCondition $sorty): self
    {
        if ($this->sorties->removeElement($sorty)) {
            // set the owning side to null (unless already changed)
            if ($sorty->getChapCondition() === $this) {
                $sorty->setChapCondition(null);
            }
        }

        return $this;
    }

    public function getChapitre(): ?Chapitre
    {
        return $this->chapitre;
    }

    public function setChapitre(?Chapitre $chapitre): self
    {
        $this->chapitre = $chapitre;

        return $this;
    }

    public function getItemCondition(): ?Item
    {
        return $this->itemCondition;
    }

    public function setItemCondition(?Item $itemCondition): self
    {
        $this->itemCondition = $itemCondition;

        return $this;
    }
}
