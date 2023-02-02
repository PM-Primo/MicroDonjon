<?php

namespace App\Entity;

use App\Repository\ChapStandardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapStandardRepository::class)
 */
class ChapStandard
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
    private $texteChapitre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $modifGold;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $modifPV;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $modifAttaque;

    /**
     * @ORM\OneToMany(targetEntity=SortieStandard::class, mappedBy="chapStandard", orphanRemoval=true, cascade={"persist"})
     */
    private $sorties;

    /**
     * @ORM\OneToOne(targetEntity=Chapitre::class, cascade={"persist", "remove"})
     */
    private $chapitre;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     */
    private $itemPrendre;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     */
    private $itemPerdre;

    public function __construct()
    {
        $this->sorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteChapitre(): ?string
    {
        return $this->texteChapitre;
    }

    public function setTexteChapitre(string $texteChapitre): self
    {
        $this->texteChapitre = $texteChapitre;

        return $this;
    }

    public function getModifGold(): ?int
    {
        return $this->modifGold;
    }

    public function setModifGold(?int $modifGold): self
    {
        $this->modifGold = $modifGold;

        return $this;
    }

    public function getModifPV(): ?int
    {
        return $this->modifPV;
    }

    public function setModifPV(?int $modifPV): self
    {
        $this->modifPV = $modifPV;

        return $this;
    }

    public function getModifAttaque(): ?int
    {
        return $this->modifAttaque;
    }

    public function setModifAttaque(?int $modifAttaque): self
    {
        $this->modifAttaque = $modifAttaque;

        return $this;
    }

    /**
     * @return Collection<int, SortieStandard>
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function addSorty(SortieStandard $sorty): self
    {
        if (!$this->sorties->contains($sorty)) {
            $this->sorties[] = $sorty;
            $sorty->setChapStandard($this);
        }

        return $this;
    }

    public function removeSorty(SortieStandard $sorty): self
    {
        if ($this->sorties->removeElement($sorty)) {
            // set the owning side to null (unless already changed)
            if ($sorty->getChapStandard() === $this) {
                $sorty->setChapStandard(null);
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

    public function getItemPrendre(): ?Item
    {
        return $this->itemPrendre;
    }

    public function setItemPrendre(?Item $itemPrendre): self
    {
        $this->itemPrendre = $itemPrendre;

        return $this;
    }

    public function getItemPerdre(): ?Item
    {
        return $this->itemPerdre;
    }

    public function setItemPerdre(?Item $itemPerdre): self
    {
        $this->itemPerdre = $itemPerdre;

        return $this;
    }
}
