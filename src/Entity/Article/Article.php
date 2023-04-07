<?php

namespace App\Entity\Article;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity()]
#[ApiResource()]
class Article
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\Column]
    private string $title;

    /** @var ArrayCollection<string, ArticleAttribute> */
    #[ORM\OneToMany(mappedBy: 'article', targetEntity: ArticleAttribute::class, cascade: ['ALL'], indexBy: 'attribute')]
    private Collection $attributes;

    public function addAttribute(string $name, ArticleAttribute $value): void
    {
        $this->attributes[$name] = new ArticleAttribute($name, $value, $this);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes;
    }

    /**
     * @param Collection $attributes
     */
    public function setAttributes(Collection $attributes): void
    {
        $this->attributes = $attributes;
    }
}
