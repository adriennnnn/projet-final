<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
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
    private $companyName;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $siretNumber;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $companyDescription;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="companies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity=ShowCase::class, mappedBy="companyId")
     */
    private $showCases;

    public function __construct()
    {
        $this->showCases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getSiretNumber(): ?string
    {
        return $this->siretNumber;
    }

    public function setSiretNumber(string $siretNumber): self
    {
        $this->siretNumber = $siretNumber;

        return $this;
    }

    public function getCompanyDescription(): ?string
    {
        return $this->companyDescription;
    }

    public function setCompanyDescription(?string $companyDescription): self
    {
        $this->companyDescription = $companyDescription;

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
     * @return Collection<int, ShowCase>
     */
    public function getShowCases(): Collection
    {
        return $this->showCases;
    }

    public function addShowCase(ShowCase $showCase): self
    {
        if (!$this->showCases->contains($showCase)) {
            $this->showCases[] = $showCase;
            $showCase->setCompanyId($this);
        }

        return $this;
    }

    public function removeShowCase(ShowCase $showCase): self
    {
        if ($this->showCases->removeElement($showCase)) {
            // set the owning side to null (unless already changed)
            if ($showCase->getCompanyId() === $this) {
                $showCase->setCompanyId(null);
            }
        }

        return $this;
    }
}
