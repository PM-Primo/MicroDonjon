<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
    private $nomItem;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageItem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomItem(): ?string
    {
        return $this->nomItem;
    }

    public function setNomItem(string $nomItem): self
    {
        $this->nomItem = $nomItem;

        return $this;
    }

    public function getImageItem(): ?string
    {
        return $this->imageItem;
    }

    public function setImageItem(?string $imageItem): self
    {
        $this->imageItem = $imageItem;

        return $this;
    }
}
