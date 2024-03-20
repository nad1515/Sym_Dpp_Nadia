<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"id_article")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreArticle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::BLOB)]
    private $image = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_user', referencedColumnName:'id_user')]
    private ?user $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_categorie', referencedColumnName:'id_categorie')]
    private ?categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreArticle(): ?string
    {
        return $this->titreArticle;
    }

    public function setTitreArticle(string $titreArticle): static
    {
        $this->titreArticle = $titreArticle;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDateCreatedAt(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreatedAt(\DateTimeImmutable $dateCreation): void
    {
        $this->dateCreation = $dateCreation;

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

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
