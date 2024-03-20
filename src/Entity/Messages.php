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
    #[ORM\Column(name:'id_message')]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $libellemessage = null;

    #[ORM\Column]
    private ?bool $important = null;

   
    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_user', referencedColumnName:'id_user')]
    private ?user $user = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_discussion', referencedColumnName:'id_discussion')]
    private ?discussions $discussions = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false, name:'id_message_1', referencedColumnName:'id_message')]
    private ?messages $id_message_1 = null;

   
   
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

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): void
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

    
    

    public function getDiscussions(): ?discussions
    {
        return $this->discussions;
    }

    public function setDiscussions(?discussions $discussions): static
    {
        $this->discussions = $discussions;

        return $this;
    }

    public function getIdMessage1(): ?messages
    {
        return $this->id_message_1;
    }

    public function setIdMessage1(?messages $id_message_1): static
    {
        $this->id_message_1 = $id_message_1;

        return $this;
    }

   

   
    
  
}
