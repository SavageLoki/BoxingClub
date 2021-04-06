<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 */
class Absence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity=Child::class, inversedBy="absences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    /**
     * @ORM\ManyToOne(targetEntity=Course::class, inversedBy="absences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $courseName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getMember(): ?Child
    {
        return $this->member;
    }

    public function setMember(?Child $member): self
    {
        $this->member = $member;

        return $this;
    }

    public function getCourseName(): ?Course
    {
        return $this->courseName;
    }

    public function setCourseName(?Course $courseName): self
    {
        $this->courseName = $courseName;

        return $this;
    }
}
