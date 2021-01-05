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
     * @ORM\Column(type="string", length=20)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=post::class, mappedBy="categoryId")
     */
    private $categoryId;

    public function __construct()
    {
        $this->categoryId = new ArrayCollection();
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

    /**
     * @return Collection|post[]
     */
    public function getCategoryId(): Collection
    {
        return $this->categoryId;
    }

    public function addCategoryId(post $categoryId): self
    {
        if (!$this->categoryId->contains($categoryId)) {
            $this->categoryId[] = $categoryId;
            $categoryId->setCategoryId($this);
        }

        return $this;
    }

    public function removeCategoryId(post $categoryId): self
    {
        if ($this->categoryId->removeElement($categoryId)) {
            // set the owning side to null (unless already changed)
            if ($categoryId->getCategoryId() === $this) {
                $categoryId->setCategoryId(null);
            }
        }

        return $this;
    }
}
