<?php

namespace App\Entity;

use App\Repository\ChapStandardRepository;
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
}
