<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MonstreRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MonstreRepository::class)
 * @ApiResource(
 * collectionOperations={"get"},
 * itemOperations={"get"},
 * normalizationContext={"groups"={"monstre:read"}}
 * )
 */
class Monstre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"monstre:read"})
     */
    private $nomMonstre;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"monstre:read"})
     */
    private $PVmaxMonstre;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"monstre:read"})
     */
    private $attaqueMonstre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     */
    private $imageMonstre;

    /**
     * @ORM\OneToMany(targetEntity=Combat::class, mappedBy="monstres")
     */
    private $combats;

    public function __construct()
    {
        $this->combats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMonstre(): ?string
    {
        return $this->nomMonstre;
    }

    public function setNomMonstre(string $nomMonstre): self
    {
        $this->nomMonstre = $nomMonstre;

        return $this;
    }

    public function getPVmaxMonstre(): ?int
    {
        return $this->PVmaxMonstre;
    }

    public function setPVmaxMonstre(int $PVmaxMonstre): self
    {
        $this->PVmaxMonstre = $PVmaxMonstre;

        return $this;
    }

    public function getAttaqueMonstre(): ?int
    {
        return $this->attaqueMonstre;
    }

    public function setAttaqueMonstre(int $attaqueMonstre): self
    {
        $this->attaqueMonstre = $attaqueMonstre;

        return $this;
    }

    public function getImageMonstre(): ?string
    {
        return $this->imageMonstre;
    }

    public function setImageMonstre(?string $imageMonstre): self
    {
        $this->imageMonstre = $imageMonstre;

        return $this;
    }

    /**
     * @return Collection<int, Combat>
     */
    public function getCombats(): Collection
    {
        return $this->combats;
    }

    public function addCombat(Combat $combat): self
    {
        if (!$this->combats->contains($combat)) {
            $this->combats[] = $combat;
            $combat->setMonstres($this);
        }

        return $this;
    }

    public function removeCombat(Combat $combat): self
    {
        if ($this->combats->removeElement($combat)) {
            // set the owning side to null (unless already changed)
            if ($combat->getMonstres() === $this) {
                $combat->setMonstres(null);
            }
        }

        return $this;
    }

    public function __toString():string{
        return $this->nomMonstre;
    }
}
