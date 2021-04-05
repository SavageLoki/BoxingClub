<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Public;

    /**
     * @ORM\OneToMany(targetEntity=Child::class, mappedBy="coursValide")
     */
    private $membre;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxMember;

    /**
     * @ORM\OneToMany(targetEntity=Child::class, mappedBy="cours")
     */
    private $members;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $heure;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $fin;

    public function __construct()
    {
        $this->members = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->Public;
    }

    public function setPublic(string $Public): self
    {
        $this->Public = $Public;

        return $this;
    }

    public function getMaxMember(): ?string
    {
        return $this->maxMember;
    }

    public function setMaxMember(string $maxMember): self
    {
        $this->maxMember = $maxMember;

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Child $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->setCours($this);
        }

        return $this;
    }

    public function removeMember(Child $member): self
    {
        if ($this->members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getCours() === $this) {
                $member->setCours(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getFin(): ?string
    {
        return $this->fin;
    }

    public function setFin(string $fin): self
    {
        $this->fin = $fin;

        return $this;
    }
}
