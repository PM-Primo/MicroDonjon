<?php

namespace App\Entity;

use App\Repository\SortieStandardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortieStandardRepository::class)
 */
class SortieStandard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ChapStandard::class, inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapStandard;

    /**
     * @ORM\ManyToOne(targetEntity=Chapitre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitre;

    /**
     * @ORM\Column(type="text")
     */
    private $texteLien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChapStandard(): ?ChapStandard
    {
        return $this->chapStandard;
    }

    public function setChapStandard(?ChapStandard $chapStandard): self
    {
        $this->chapStandard = $chapStandard;

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

    public function getTexteLien(): ?string
    {
        return $this->texteLien;
    }

    public function setTexteLien(string $texteLien): self
    {
        $this->texteLien = $texteLien;

        return $this;
    }
}
