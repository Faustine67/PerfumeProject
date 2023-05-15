<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'marque', targetEntity: Parfum::class)]
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
            $parfum->setMarque($this);
        }

        return $this;
    }

    public function removeParfum(Parfum $parfum): self
    {
        if ($this->parfums->removeElement($parfum)) {
            // set the owning side to null (unless already changed)
            if ($parfum->getMarque() === $this) {
                $parfum->setMarque(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNom() ?? '';
    }
    
}
