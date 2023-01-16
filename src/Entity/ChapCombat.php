<?php

namespace App\Entity;

use App\Repository\ChapCombatRepository;
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
}
