<?php

namespace App\Entity;

use App\Repository\NoteDeTeteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteDeTeteRepository::class)]
class NoteDeTete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Parfum::class, mappedBy: 'noteTete')]
    private Collection $parfums;

    public function __construct()
    {
        $this->parfums = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Parfum>
     */
    public function getParfums(): Collection
    {
        return $this->parfums;
    }

    public function addParfum(Parfum $parfum): self
    {
        if (!$this->parfums->contains($parfum)) {
            $this->parfums->add($parfum);
            $parfum->addNoteTete($this);
        }

        return $this;
    }

    public function removeParfum(Parfum $parfum): self
    {
        if ($this->parfums->removeElement($parfum)) {
            $parfum->removeNoteTete($this);
        }

        return $this;
    }

    public function setNoteDeTete(string $noteDeTete): self
    {
        $this->setNom($noteDeTete);
    
        return $this;
    }
    

    public function __toString(): string
    {
        return $this->getNom() ?? '';
    }
}