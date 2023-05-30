<?php

namespace App\Entity;
use App\Entity\NoteDeTete;
use App\Entity\Commentaire;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ParfumRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ParfumRepository::class)]
class Parfum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $prix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $avis = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'parfums')]
    private ?Marque $marque = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'parfumsfavoris')]
    private Collection $users;

    #[ORM\ManyToMany(targetEntity:User::class)]
    #[ORM\JoinTable(name: 'user_post_like')]
    private Collection $likes;
    

    // #[ORM\ManyToOne(inversedBy: 'parfumsSuggestion')]
    // private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'parfums')]
    private Collection $dupe;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'dupe')]
    private Collection $parfums;

    #[ORM\ManyToMany(targetEntity: NoteDeTete::class, inversedBy: 'parfums')]
    private Collection $noteTete;

    #[ORM\ManyToMany(targetEntity: NoteDeCoeur::class, inversedBy: 'parfums')]
    private Collection $noteCoeur;

    #[ORM\ManyToMany(targetEntity: NoteDeFond::class, inversedBy: 'parfums')]
    private Collection $noteFond;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $contenance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'parfum', targetEntity: Commentaire::class)]
    private Collection $commentaires;


    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->dupe = new ArrayCollection();
        // $this->parfums = new ArrayCollection();
        $this->noteTete = new ArrayCollection();
        $this->noteCoeur = new ArrayCollection();
        $this->noteFond = new ArrayCollection();
        $this->likes= new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(?string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->Users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addParfumsfavori($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeParfumsfavori($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getDupe(): Collection
    {
        return $this->dupe;
    }

    public function addDupe(self $dupe): self
    {
        if (!$this->dupe->contains($dupe)) {
            $this->dupe->add($dupe);
        }

        return $this;
    }

    public function removeDupe(self $dupe): self
    {
        $this->dupe->removeElement($dupe);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getParfums(): Collection
    {
        return $this->parfums;
    }

    public function addParfum(self $parfum): self
    {
        if (!$this->parfums->contains($parfum)) {
            $this->parfums->add($parfum);
            $parfum->addDupe($this);
        }

        return $this;
    }

    public function removeParfum(self $parfum): self
    {
        if ($this->parfums->removeElement($parfum)) {
            $parfum->removeDupe($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, NoteDeTete>
     */
    public function getNoteTete(): Collection
    {
        return $this->noteTete;
    }

    public function addNoteTete(NoteDeTete $noteTete): self
    {
        if (!$this->noteTete->contains($noteTete)) {
            $this->noteTete->add($noteTete);
        }

        return $this;
    }

    public function removeNoteTete(NoteDeTete $noteTete): self
    {
        $this->noteTete->removeElement($noteTete);

        return $this;
    }

    /**
     * @return Collection<int, NoteDeCoeur>
     */
    public function getNoteCoeur(): Collection
    {
        return $this->noteCoeur;
    }

    public function addNoteCoeur(NoteDeCoeur $noteCoeur): self
    {
        if (!$this->noteCoeur->contains($noteCoeur)) {
            $this->noteCoeur->add($noteCoeur);
        }

        return $this;
    }

    public function removeNoteCoeur(NoteDeCoeur $noteCoeur): self
    {
        $this->noteCoeur->removeElement($noteCoeur);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getNoteFond(): Collection
    {
        return $this->noteFond;
    }

    public function addNoteFond(NoteDeFond $noteFond): self
    {
        if (!$this->noteFond->contains($noteFond)) {
            $this->noteFond->add($noteFond);
        }

        return $this;
    }

    public function removeNoteFond(NoteDeFond $noteFond): self
    {
        $this->noteFond->removeElement($noteFond);

        return $this;
    }

    public function getContenance(): ?string
    {
        return $this->contenance;
    }

    public function setContenance(?string $contenance): self
    {
        $this->contenance = $contenance;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLikes():Collection
    {
        return $this->likes;
    }

    public function addLike(User $like):self
    {
        if(!$this->likes->contains($like)) {
            $this->likes[]= $like;
        }
        return $this;
    }

    public function removeLike(User $like):self
    {
        $this->likes->removeElement($like);
        return $this;
    }

    public function isLikedByUser(User $user):bool
    {
        return $this->likes->contains($user);
    }

    public function __toString(): string
    {
        return $this->getNom() ?? '';
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setParfum($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getParfum() === $this) {
                $commentaire->setParfum(null);
            }
        }

        return $this;
    }

}
