<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagesRepository::class)]
#[ORM\HasLifecycleCallbacks]
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



    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false, name:'parent_id', referencedColumnName:'id_message')]
    private ?self $parent = null;

    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $messages;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    #[ORM\JoinColumn(nullable: false, name:'id_discussion', referencedColumnName:'id_discussion')]
    private ?Discussions $Discussions = null;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    
   
   
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

    
       public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(self $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setParent($this);
        }

        return $this;
    }

    public function removeMessage(self $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getParent() === $this) {
                $message->setParent(null);
            }
        }

        return $this;
    }

    public function getDiscussions(): ?Discussions
    {
        return $this->Discussions;
    }

    public function setDiscussions(?Discussions $Discussions): static
    {
        $this->Discussions = $Discussions;

        return $this;
    }

   
   

   
    
  
}
