<?php

namespace App\Entity;

use App\Repository\ChapConditionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapConditionRepository::class)
 */
class ChapCondition
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
    private $texteSiVrai;

    /**
     * @ORM\Column(type="text")
     */
    private $texteSiFaux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTexteSiVrai(): ?string
    {
        return $this->texteSiVrai;
    }

    public function setTexteSiVrai(string $texteSiVrai): self
    {
        $this->texteSiVrai = $texteSiVrai;

        return $this;
    }

    public function getTexteSiFaux(): ?string
    {
        return $this->texteSiFaux;
    }

    public function setTexteSiFaux(string $texteSiFaux): self
    {
        $this->texteSiFaux = $texteSiFaux;

        return $this;
    }
}
