<?php

namespace App\Entity;

use App\Repository\CombatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CombatRepository::class)
 */
class Combat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="combats")
     */
    private $aventurier;

    /**
     * @ORM\ManyToOne(targetEntity=Monstre::class, inversedBy="combats")
     */
    private $monstres;

    /**
     * @ORM\Column(type="integer")
     */
    private $PVactuelsMonstre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAventurier(): ?User
    {
        return $this->aventurier;
    }

    public function setAventurier(?User $aventurier): self
    {
        $this->aventurier = $aventurier;

        return $this;
    }

    public function getMonstres(): ?Monstre
    {
        return $this->monstres;
    }

    public function setMonstres(?Monstre $monstres): self
    {
        $this->monstres = $monstres;

        return $this;
    }

    public function getPVactuelsMonstre(): ?int
    {
        return $this->PVactuelsMonstre;
    }

    public function setPVactuelsMonstre(int $PVactuelsMonstre): self
    {
        $this->PVactuelsMonstre = $PVactuelsMonstre;

        return $this;
    }
}
