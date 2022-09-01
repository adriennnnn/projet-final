<?php

namespace App\Entity;

use App\Repository\ShowCaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ShowCaseRepository::class)
 */
class ShowCase
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
    private $title;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="showCases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $companyId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="showCases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity=ImageShowCase::class, mappedBy="ShowCase_id", orphanRemoval=true, cascade={"persist"})
     */
    private $imageShowCases;

        /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="showcase", orphanRemoval=true, cascade={"persist"})
     */
    private $categories;

    public function __construct()
    {
        $this->imageShowCases = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCompanyId(): ?Company
    {
        return $this->companyId;
    }

    public function setCompanyId(?Company $companyId): self
    {
        $this->companyId = $companyId;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection<int, ImageShowCase>
     */
    public function getImageShowCases(): Collection
    {
        return $this->imageShowCases;
    }

    public function addImageShowCase(ImageShowCase $imageShowCase): self
    {
        if (!$this->imageShowCases->contains($imageShowCase)) {
            $this->imageShowCases[] = $imageShowCase;
            $imageShowCase->setShowCaseId($this);
        }

        return $this;
    }

    public function removeImageShowCase(ImageShowCase $imageShowCase): self
    {
        if ($this->imageShowCases->removeElement($imageShowCase)) {
            // set the owning side to null (unless already changed)
            if ($imageShowCase->getShowCaseId() === $this) {
                $imageShowCase->setShowCaseId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addShowCaseId($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeShowCaseId($this);
        }

        return $this;
    }


   
}
