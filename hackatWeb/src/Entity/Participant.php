<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
class Participant implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $nom = null;

    #[ORM\Column(length: 128)]
    private ?string $prenom = null;

    #[ORM\Column(length: 128)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: 'dateNaissance')]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 128, name: 'lienPortfolio')]
    private ?string $lienPortfolio = null;

    #[ORM\Column(length: 128)]
    private ?string $mdp = null;

    #[ORM\OneToMany(mappedBy: 'leParticipant', targetEntity: InscriptionHackathon::class)]
    private Collection $lesInscriptions;

    
    #[ORM\Column(type :"json")]
    private $roles=[];


    /***méthode qui renvoie une chaîne avec les informations voulues pour représenter un utilisateur.*/
    public function getUserIdentifier() : string
    {
        return (string) $this->prenom." ".$this->nom;
    }
    
    public function getRoles() : array
    {
        $roles=$this->roles;
        //guaranteeeveryuseratleasthasROLE_USER
        $roles[]='ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles) : self
    {
        $this->roles=$roles;
        return$this;
    }
    
    public function getPassword() : string
    {
        return $this->mdp;
    }

    public function setPassword(string $password) : self
    {
        $this->mdp = $password;
        return$this;
    }
    
    public function eraseCredentials()
    {
        //Ifyoustoreanytemporary,sensitivedataontheuser,clearithere
        //$this->plainPassword=null;
    }

    public function __construct()
    {
        $this->lesInscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLienPortfolio(): ?string
    {
        return $this->lienPortfolio;
    }

    public function setLienPortfolio(string $lienPortfolio): static
    {
        $this->lienPortfolio = $lienPortfolio;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

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
            $lesInscription->setLeParticipant($this);
        }

        return $this;
    }

    public function removeLesInscription(InscriptionHackathon $lesInscription): static
    {
        if ($this->lesInscriptions->removeElement($lesInscription)) {
            // set the owning side to null (unless already changed)
            if ($lesInscription->getLeParticipant() === $this) {
                $lesInscription->setLeParticipant(null);
            }
        }

        return $this;
    }
}
