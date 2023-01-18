<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
class Zone
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
    private $nomZone;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionZone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichierMap;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="visites")
     */
    private $visiteurs;

    /**
     * @ORM\OneToMany(targetEntity=Chapitre::class, mappedBy="zone")
     */
    private $chapitres;

    public function __construct()
    {
        $this->visiteurs = new ArrayCollection();
        $this->chapitres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomZone(): ?string
    {
        return $this->nomZone;
    }

    public function setNomZone(string $nomZone): self
    {
        $this->nomZone = $nomZone;

        return $this;
    }

    public function getDescriptionZone(): ?string
    {
        return $this->descriptionZone;
    }

    public function setDescriptionZone(?string $descriptionZone): self
    {
        $this->descriptionZone = $descriptionZone;

        return $this;
    }

    public function getFichierMap(): ?string
    {
        return $this->fichierMap;
    }

    public function setFichierMap(?string $fichierMap): self
    {
        $this->fichierMap = $fichierMap;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getVisiteurs(): Collection
    {
        return $this->visiteurs;
    }

    public function addVisiteur(User $visiteur): self
    {
        if (!$this->visiteurs->contains($visiteur)) {
            $this->visiteurs[] = $visiteur;
            $visiteur->addVisite($this);
        }

        return $this;
    }

    public function removeVisiteur(User $visiteur): self
    {
        if ($this->visiteurs->removeElement($visiteur)) {
            $visiteur->removeVisite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Chapitre>
     */
    public function getChapitres(): Collection
    {
        return $this->chapitres;
    }

    public function addChapitre(Chapitre $chapitre): self
    {
        if (!$this->chapitres->contains($chapitre)) {
            $this->chapitres[] = $chapitre;
            $chapitre->setZone($this);
        }

        return $this;
    }

    public function removeChapitre(Chapitre $chapitre): self
    {
        if ($this->chapitres->removeElement($chapitre)) {
            // set the owning side to null (unless already changed)
            if ($chapitre->getZone() === $this) {
                $chapitre->setZone(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomZone;
    }

}
