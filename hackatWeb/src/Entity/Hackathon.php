<?php

namespace App\Entity;

use App\Repository\HackathonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HackathonRepository::class)]
#[ORM\Table(name:'hackathon')]
class Hackathon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column (name: 'nbPlacesMax')]
    private ?int $nbPlacesMax = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, name: 'dateLimiteInscription')]
    private ?\DateTimeInterface $dateLimiteInscription = null;

    #[ORM\Column(length: 128)]
    private ?string $titre = null;

    #[ORM\Column(length: 128)]
    private ?string $ville = null;

    #[ORM\Column(name: 'codePostal')]
    private ?int $codePostal = null;

    #[ORM\Column(length: 128)]
    private ?string $rue = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: 'dateDebut')]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: 'dateFin')]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, name: 'heureDebut')]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, name: 'heureFin')]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\OneToMany(mappedBy: 'leHackathon', targetEntity: InscriptionHackathon::class)]
    private Collection $lesInscriptions;

    public function __construct()
    {
        $this->lesInscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPlacesMax(): ?int
    {
        return $this->nbPlacesMax;
    }

    public function setNbPlacesMax(int $nbPlacesMax): static
    {
        $this->nbPlacesMax = $nbPlacesMax;

        return $this;
    }

    public function getDateLimiteInscription(): ?\DateTimeInterface
    {
        return $this->dateLimiteInscription;
    }

    public function setDateLimiteInscription(\DateTimeInterface $dateLimiteInscription): static
    {
        $this->dateLimiteInscription = $dateLimiteInscription;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): static
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): static
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * @return Collection<int, InscriptionHackathon>
     */
    public function getLesInscriptions(): Collection
    {
        return $this->lesInscriptions;
    }

    public function addLesInscription(InscriptionHackathon $lesInscription): static
    {
        if (!$this->lesInscriptions->contains($lesInscription)) {
            $this->lesInscriptions->add($lesInscription);
            $lesInscription->setLeHackathon($this);
        }

        return $this;
    }

    public function removeLesInscription(InscriptionHackathon $lesInscription): static
    {
        if ($this->lesInscriptions->removeElement($lesInscription)) {
            // set the owning side to null (unless already changed)
            if ($lesInscription->getLeHackathon() === $this) {
                $lesInscription->setLeHackathon(null);
            }
        }

        return $this;
    }
}
