<?php

namespace App\Entity;

use App\Repository\FavoriRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavoriRepository::class)]
class Favori
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lesFavoris')]
    #[ORM\JoinColumn(nullable: false, name: 'idParticipant', referencedColumnName: 'id')]
    private ?Participant $leParticipant = null;

    #[ORM\ManyToOne(inversedBy: 'lesFavoris')]
    #[ORM\JoinColumn(nullable: false, name: 'idHackathon', referencedColumnName: 'id')]
    private ?Hackathon $leHackathon = null;

    public function getId(): ?int
    {
        return $this->id;
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
