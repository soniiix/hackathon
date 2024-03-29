<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
#[UniqueEntity('mail', message:'Cet email est déjà utilisé pour un autre compte.')]
class Participant implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    #[Assert\Type('string', message:'Nom invalide')]
    private ?string $nom = null;

    #[ORM\Column(length: 128)]
    #[Assert\Type('string', message:'Prénom invalide')]
    private ?string $prenom = null;

    #[ORM\Column(length: 128, unique: true)]
    #[Assert\Email(message: 'Veuillez saisir un email valide.')]
    private ?string $mail = null;

    #[ORM\Column]
    //#[Assert\Regex("^(0\d{9}|0\d{1}[\s-]?(\d{2}[\s-]?){4})$", message:'Veuillez saisir un numéro de téléphone valide.')]
    private ?int $tel = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: 'dateNaissance')]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 128, name: 'lienPortfolio')]
    #[Assert\Url(message:'Veuillez saisir un lien valide.')]
    private ?string $lienPortfolio = null;

    #[ORM\Column(length: 128)]
    #[Assert\PasswordStrength(message:'Veuillez saisir un mot de passe complexe')]
    private ?string $mdp = null;

    #[ORM\OneToMany(mappedBy: 'leParticipant', targetEntity: InscriptionHackathon::class)]
    private Collection $lesInscriptions;

    //propriété de connexion
    #[ORM\Column(type :"json")]
    private $roles=[];

    #[ORM\OneToMany(mappedBy: 'leParticipant', targetEntity: Favori::class)]
    private Collection $lesFavoris;


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
        $this->lesFavoris = new ArrayCollection();
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

    /**
     * @return Collection<int, Favori>
     */
    public function getLesFavoris(): Collection
    {
        return $this->lesFavoris;
    }

    public function addLesFavori(Favori $lesFavori): static
    {
        if (!$this->lesFavoris->contains($lesFavori)) {
            $this->lesFavoris->add($lesFavori);
            $lesFavori->setLeParticipant($this);
        }

        return $this;
    }

    public function removeLesFavori(Favori $lesFavori): static
    {
        if ($this->lesFavoris->removeElement($lesFavori)) {
            // set the owning side to null (unless already changed)
            if ($lesFavori->getLeParticipant() === $this) {
                $lesFavori->setLeParticipant(null);
            }
        }

        return $this;
    }
}
