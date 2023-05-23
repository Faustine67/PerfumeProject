<?php

namespace App\Entity;

use App\Entity\NoteDeFond;
use App\Entity\NoteDeTete;
use App\Entity\NoteDeCoeur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\NotesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: NotesRepository::class)]
class Notes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'notes', targetEntity: NoteDeTete::class)]
    private Collection $noteDeTete;

    #[ORM\OneToMany(mappedBy: 'notes', targetEntity: NoteDeCoeur::class)]
    private Collection $noteDeCoeur;

    #[ORM\OneToMany(mappedBy: 'notes', targetEntity: NoteDeFond::class)]
    private Collection $noteDeFond;

    public function __construct()
    {
        $this->noteDeTete = new ArrayCollection();
        $this->noteDeCoeur = new ArrayCollection();
        $this->noteDeFond = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, NoteDeTete>
     */
    public function getNoteDeTete(): Collection
    {
        return $this->noteDeTete;
    }

    public function addNoteDeTete(NoteDeTete $noteDeTete): self
    {
        if (!$this->noteDeTete->contains($noteDeTete)) {
            $this->noteDeTete->add($noteDeTete);
            $noteDeTete->setNotes($this);
        }

        return $this;
    }

    public function removeNoteDeTete(NoteDeTete $noteDeTete): self
    {
        if ($this->noteDeTete->removeElement($noteDeTete)) {
            // set the owning side to null (unless already changed)
            if ($noteDeTete->getNotes() === $this) {
                $noteDeTete->setNotes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NoteDeCoeur>
     */
    public function getNoteDeCoeur(): Collection
    {
        return $this->noteDeCoeur;
    }

    public function addNoteDeCoeur(NoteDeCoeur $noteDeCoeur): self
    {
        if (!$this->noteDeCoeur->contains($noteDeCoeur)) {
            $this->noteDeCoeur->add($noteDeCoeur);
            $noteDeCoeur->setNotes($this);
        }

        return $this;
    }

    public function removeNoteDeCoeur(NoteDeCoeur $noteDeCoeur): self
    {
        if ($this->noteDeCoeur->removeElement($noteDeCoeur)) {
            // set the owning side to null (unless already changed)
            if ($noteDeCoeur->getNotes() === $this) {
                $noteDeCoeur->setNotes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NoteDeFond>
     */
    public function getNoteDeFond(): Collection
    {
        return $this->noteDeFond;
    }

    public function addNoteDeFond(NoteDeFond $noteDeFond): self
    {
        if (!$this->noteDeFond->contains($noteDeFond)) {
            $this->noteDeFond->add($noteDeFond);
            $noteDeFond->setNotes($this);
        }

        return $this;
    }

    public function removeNoteDeFond(NoteDeFond $noteDeFond): self
    {
        if ($this->noteDeFond->removeElement($noteDeFond)) {
            // set the owning side to null (unless already changed)
            if ($noteDeFond->getNotes() === $this) {
                $noteDeFond->setNotes(null);
            }
        }

        return $this;
    }

}
