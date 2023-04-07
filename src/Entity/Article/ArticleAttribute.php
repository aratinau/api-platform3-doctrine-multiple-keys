<?php

namespace App\Entity\Article;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ApiResource()]
class ArticleAttribute
{
    #[ORM\Id, ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'attributes')]
    private Article $article;

    #[ORM\Id, ORM\Column]
    private string $attribute;

    #[ORM\Column]
    private string $value;

    public function __construct(string $name, string $value, Article $article)
    {
        $this->attribute = $name;
        $this->value = $value;
        $this->article = $article;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * @param Article $article
     */
    public function setArticle(Article $article): void
    {
        $this->article = $article;
    }

    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @param string $attribute
     */
    public function setAttribute(string $attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
