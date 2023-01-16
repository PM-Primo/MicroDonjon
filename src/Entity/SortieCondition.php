<?php

namespace App\Entity;

use App\Repository\SortieConditionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortieConditionRepository::class)
 */
class SortieCondition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ChapCondition::class, inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapCondition;

    /**
     * @ORM\ManyToOne(targetEntity=Chapitre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $conditionVrai;

    /**
     * @ORM\Column(type="text")
     */
    private $texteLien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChapCondition(): ?ChapCondition
    {
        return $this->chapCondition;
    }

    public function setChapCondition(?ChapCondition $chapCondition): self
    {
        $this->chapCondition = $chapCondition;

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

    public function isConditionVrai(): ?bool
    {
        return $this->conditionVrai;
    }

    public function setConditionVrai(?bool $conditionVrai): self
    {
        $this->conditionVrai = $conditionVrai;

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
