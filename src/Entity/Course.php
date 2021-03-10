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

    public function __construct()
    {
        $this->membre = new ArrayCollection();
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

    /**
     * @return Collection|Child[]
     */
    public function getMembre(): Collection
    {
        return $this->membre;
    }

    public function addMembre(Child $membre): self
    {
        if (!$this->membre->contains($membre)) {
            $this->membre[] = $membre;
            $membre->setCoursValide($this);
        }

        return $this;
    }

    public function removeMembre(Child $membre): self
    {
        if ($this->membre->removeElement($membre)) {
            // set the owning side to null (unless already changed)
            if ($membre->getCoursValide() === $this) {
                $membre->setCoursValide(null);
            }
        }

        return $this;
    }

    public function getMaxMember(): ?int
    {
        return $this->maxMember;
    }

    public function setMaxMember(int $maxMember): self
    {
        $this->maxMember = $maxMember;

        return $this;
    }
}
