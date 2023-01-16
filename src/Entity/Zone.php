<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
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
}
