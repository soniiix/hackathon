<?php

namespace App\Entity;

use App\Repository\InscriptionHackathonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionHackathonRepository::class)]
class InscriptionHackathon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'lesInscriptions')]
    #[ORM\JoinColumn(name: "idParticipant", referencedColumnName :"id", nullable: false)]
    private ?Participant $leParticipant = null;

    #[ORM\ManyToOne(inversedBy: 'lesInscriptions')]
    #[ORM\JoinColumn(name: "idParticipant", referencedColumnName :"id", nullable: false)]
    private ?Hackathon $leHackathon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getLeParticipant(): ?Participant
    {
        return $this->leParticipant;
    }

    public function setLeParticipant(?Participant $leParticipant): static
    {
        $this->leParticipant = $leParticipant;

        return $this;
    }

    public function getLeHackathon(): ?Hackathon
    {
        return $this->leHackathon;
    }

    public function setLeHackathon(?Hackathon $leHackathon): static
    {
        $this->leHackathon = $leHackathon;

        return $this;
    }
}
