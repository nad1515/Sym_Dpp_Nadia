<?php

namespace App\Entity;

use App\Repository\DiscutionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscutionsRepository::class)]
class Discutions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column("id_discution")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSujet = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $libelleSujet = null;

    
    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_user', referencedColumnName:'id_user')]
    private ?user $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_forum', referencedColumnName:'id_forum')]
    private ?forum $forum = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSujet(): ?string
    {
        return $this->nomSujet;
    }

    public function setNomSujet(string $nomSujet): static
    {
        $this->nomSujet = $nomSujet;

        return $this;
    }

    public function getLibelleSujet(): ?string
    {
        return $this->libelleSujet;
    }

    public function setLibelleSujet(string $libelleSujet): static
    {
        $this->libelleSujet = $libelleSujet;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setCreatedAt(\DateTimeImmutable $dateCreation): void
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

    public function getForum(): ?forum
    {
        return $this->forum;
    }

    public function setForum(?forum $forum): static
    {
        $this->forum = $forum;

        return $this;
    }
}
