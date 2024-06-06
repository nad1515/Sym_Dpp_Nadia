<?php

namespace App\Entity;

use App\Repository\DiscussionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscussionsRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Discussions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column("id_discussion")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSujet = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $libelleSujet = null;

    
    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\ManyToOne(inversedBy: 'discussions')]
    #[ORM\JoinColumn(nullable: false, name:'id_user', referencedColumnName:'id_user')]
    private ?User $User = null;

    #[ORM\ManyToOne(inversedBy: 'discussions')]
    #[ORM\JoinColumn(nullable: false, name:'id_forum', referencedColumnName:'id_forum')]
    private ?Forum $Forum = null;

    #[ORM\OneToMany(targetEntity: Messages::class, mappedBy: 'Discussions')]
    private Collection $messages;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

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

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): void
    {
        $this->dateCreation = $dateCreation;

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

    public function getForum(): ?Forum
    {
        return $this->Forum;
    }

    public function setForum(?Forum $Forum): static
    {
        $this->Forum = $Forum;

        return $this;
    }

    /**
     * @return Collection<int, Messages>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Messages $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setDiscussions($this);
        }

        return $this;
    }

    public function removeMessage(Messages $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getDiscussions() === $this) {
                $message->setDiscussions(null);
            }
        }

        return $this;
    }
}
