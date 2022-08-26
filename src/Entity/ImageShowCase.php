<?php

namespace App\Entity;

use App\Repository\ImageShowCaseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageShowCaseRepository::class)
 */
class ImageShowCase
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
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=ShowCase::class, inversedBy="imageShowCases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ShowCase_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getShowCaseId(): ?ShowCase
    {
        return $this->ShowCase_id;
    }

    public function setShowCaseId(?ShowCase $ShowCase_id): self
    {
        $this->ShowCase_id = $ShowCase_id;

        return $this;
    }
}
