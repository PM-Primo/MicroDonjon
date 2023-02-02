<?php

namespace App\Entity;

use App\Repository\ChapCombatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapCombatRepository::class)
 */
class ChapCombat
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
    private $texteInitial;

    /**
     * @ORM\Column(type="text")
     */
    private $texteVictoire;

    /**
     * @ORM\OneToOne(targetEntity=Chapitre::class, cascade={"persist", "remove"})
     */
    private $chapitre;

    /**
     * @ORM\OneToMany(targetEntity=SortieCombat::class, mappedBy="chapCombat", orphanRemoval=true, cascade={"persist"})
     */
    private $sorties;

    /**
     * @ORM\ManyToOne(targetEntity=Monstre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $monstre;

    public function __construct()
    {
        $this->sorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteInitial(): ?string
    {
        return $this->texteInitial;
    }

    public function setTexteInitial(string $texteInitial): self
    {
        $this->texteInitial = $texteInitial;

        return $this;
    }

    public function getTexteVictoire(): ?string
    {
        return $this->texteVictoire;
    }

    public function setTexteVictoire(string $texteVictoire): self
    {
        $this->texteVictoire = $texteVictoire;

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

    /**
     * @return Collection<int, SortieCombat>
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function addSorty(SortieCombat $sorty): self
    {
        if (!$this->sorties->contains($sorty)) {
            $this->sorties[] = $sorty;
            $sorty->setChapCombat($this);
        }

        return $this;
    }

    public function removeSorty(SortieCombat $sorty): self
    {
        if ($this->sorties->removeElement($sorty)) {
            // set the owning side to null (unless already changed)
            if ($sorty->getChapCombat() === $this) {
                $sorty->setChapCombat(null);
            }
        }

        return $this;
    }

    public function getMonstre(): ?Monstre
    {
        return $this->monstre;
    }

    public function setMonstre(?Monstre $monstre): self
    {
        $this->monstre = $monstre;

        return $this;
    }
}
