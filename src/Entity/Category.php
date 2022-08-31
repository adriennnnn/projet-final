<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=ShowCase::class, inversedBy="categories")
     */
    private $ShowCase_id;

    public function __construct()
    {
        $this->ShowCase_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, ShowCase>
     */
    public function getShowCaseId(): Collection
    {
        return $this->ShowCase_id;
    }

    public function addShowCaseId(ShowCase $showCaseId): self
    {
        if (!$this->ShowCase_id->contains($showCaseId)) {
            $this->ShowCase_id[] = $showCaseId;
        }

        return $this;
    }

    public function removeShowCaseId(ShowCase $showCaseId): self
    {
        $this->ShowCase_id->removeElement($showCaseId);

        return $this;
    }
}
