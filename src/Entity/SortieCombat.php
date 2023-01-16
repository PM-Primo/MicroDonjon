<?php

namespace App\Entity;

use App\Repository\SortieCombatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortieCombatRepository::class)
 */
class SortieCombat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ChapCombat::class, inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapCombat;

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

    public function getChapCombat(): ?ChapCombat
    {
        return $this->chapCombat;
    }

    public function setChapCombat(?ChapCombat $chapCombat): self
    {
        $this->chapCombat = $chapCombat;

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
