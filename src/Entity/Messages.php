<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagesRepository::class)]
class Messages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $libellemessage = null;

    #[ORM\Column]
    private ?bool $important = null;

   
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?discutions $discutions = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?messages $messages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellemessage(): ?string
    {
        return $this->libellemessage;
    }

    public function setLibellemessage(string $libellemessage): static
    {
        $this->libellemessage = $libellemessage;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;

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

    
    

    public function getDiscutions(): ?discutions
    {
        return $this->discutions;
    }

    public function setDiscutions(?discutions $discutions): static
    {
        $this->discutions = $discutions;

        return $this;
    }

    public function getMessages(): ?messages
    {
        return $this->messages;
    }

    public function setMessages(?messages $messages): static
    {
        $this->messages = $messages;

        return $this;
    }
}
