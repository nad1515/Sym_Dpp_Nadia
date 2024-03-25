<?php

namespace App\Entity;

use App\Repository\CommentairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentairesRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Commentaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_commentaire")]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $libelleCommentaire = null;

    #[ORM\Column]
    private ?bool $important = null;

   
    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_user', referencedColumnName:'id_user')]
    private ?user $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_article', referencedColumnName:'id_article')]
    private ?articles $articles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCommentaire(): ?string
    {
        return $this->libelleCommentaire;
    }

    public function setLibelleCommentaire(string $libelleCommentaire): static
    {
        $this->libelleCommentaire = $libelleCommentaire;

        return $this;
    }

    public function isImportant(): ?bool
    {
        return $this->important;
    }

    public function setImportant(bool $important): static
    {
        $this->important = $important;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): void
    {
        $this->dateCreation =$dateCreation;

    }
    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getArticles(): ?articles
    {
        return $this->articles;
    }

    public function setArticles(?articles $articles): static
    {
        $this->articles = $articles;

        return $this;
    }
}
