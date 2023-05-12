<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $surnom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\ManyToMany(targetEntity: Parfum::class, inversedBy: 'utilisateurs')]
    private Collection $parfumsfavoris;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Parfum::class)]
    private Collection $parfumsSuggestion;

    public function __construct()
    {
        $this->parfumsfavoris = new ArrayCollection();
        $this->parfumsSuggestion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getSurnom(): ?string
    {
        return $this->surnom;
    }

    public function setSurnom(string $surnom): self
    {
        $this->surnom = $surnom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection<int, Parfum>
     */
    public function getParfumsfavoris(): Collection
    {
        return $this->parfumsfavoris;
    }

    public function addParfumsfavori(Parfum $parfumsfavori): self
    {
        if (!$this->parfumsfavoris->contains($parfumsfavori)) {
            $this->parfumsfavoris->add($parfumsfavori);
        }

        return $this;
    }

    public function removeParfumsfavori(Parfum $parfumsfavori): self
    {
        $this->parfumsfavoris->removeElement($parfumsfavori);

        return $this;
    }

    /**
     * @return Collection<int, Parfum>
     */
    public function getParfumsSuggestion(): Collection
    {
        return $this->parfumsSuggestion;
    }

    public function addParfumsSuggestion(Parfum $parfumsSuggestion): self
    {
        if (!$this->parfumsSuggestion->contains($parfumsSuggestion)) {
            $this->parfumsSuggestion->add($parfumsSuggestion);
            $parfumsSuggestion->setUtilisateur($this);
        }

        return $this;
    }

    public function removeParfumsSuggestion(Parfum $parfumsSuggestion): self
    {
        if ($this->parfumsSuggestion->removeElement($parfumsSuggestion)) {
            // set the owning side to null (unless already changed)
            if ($parfumsSuggestion->getUtilisateur() === $this) {
                $parfumsSuggestion->setUtilisateur(null);
            }
        }

        return $this;
    }
}
