<?php

namespace App\Entity;

use App\Repository\ChapitreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapitreRepository::class)
 */
class Chapitre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreChapitre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typePage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreChapitre(): ?string
    {
        return $this->titreChapitre;
    }

    public function setTitreChapitre(?string $titreChapitre): self
    {
        $this->titreChapitre = $titreChapitre;

        return $this;
    }

    public function getTypePage(): ?string
    {
        return $this->typePage;
    }

    public function setTypePage(string $typePage): self
    {
        $this->typePage = $typePage;

        return $this;
    }
}
