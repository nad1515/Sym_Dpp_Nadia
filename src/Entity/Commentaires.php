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




    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false, name:'id_user', referencedColumnName:'id_user' )]
    private ?User $User = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false, name:'id_article', referencedColumnName:'id_article')]
    private ?Articles $Articles = null;

    

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
    

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function getArticles(): ?Articles
    {
        return $this->Articles;
    }

    public function setArticles(?Articles $Articles): static
    {
        $this->Articles = $Articles;

        return $this;
    }

   

}
