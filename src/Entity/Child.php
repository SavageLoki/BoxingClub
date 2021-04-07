<?php

namespace App\Entity;

use App\Repository\ChildRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass=ChildRepository::class)
 */
class Child extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $numeroParent;


    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=Course::class, inversedBy="members")
     */
    private $cours;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $paiement;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datePaiement;

    /**
     * @ORM\OneToMany(targetEntity=Absence::class, mappedBy="member")
     */
    private $absences;

    public function __construct()
    {
        $this->absences = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getNumeroParent(): ?string
    {
        return $this->numeroParent;
    }

    public function setNumeroParent(?string $numeroParent): self
    {
        $this->numeroParent = $numeroParent;

        return $this;
    }


    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getCours(): ?Course
    {
        return $this->cours;
    }

    public function setCours(?Course $cours): self
    {
        $this->cours = $cours;

        return $this;
    }

    public function getPaiement(): ?string
    {
        return $this->paiement;
    }

    public function setPaiement(string $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(?\DateTimeInterface $datePaiement): self
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    /**
     * @return Collection|Absence[]
     */
    public function getAbsences(): Collection
    {
        return $this->absences;
    }

    public function addAbsence(Absence $absence): self
    {
        if (!$this->absences->contains($absence)) {
            $this->absences[] = $absence;
            $absence->setMember($this);
        }

        return $this;
    }

    public function removeAbsence(Absence $absence): self
    {
        if ($this->absences->removeElement($absence)) {
            // set the owning side to null (unless already changed)
            if ($absence->getMember() === $this) {
                $absence->setMember(null);
            }
        }

        return $this;
    }
}
