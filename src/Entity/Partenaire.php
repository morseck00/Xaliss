<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur", mappedBy="partenaire")
     */
    private $utilisateurs;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $raisonSociale;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Compte", mappedBy="partenaire")
     */
    private $comptes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Envoi", mappedBy="Agence", orphanRemoval=true)
     */
    private $date_envoi;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Retrait", mappedBy="Agence")
     */
    private $retraits;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->comptes = new ArrayCollection();
        $this->date_envoi = new ArrayCollection();
        $this->retraits = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setPartenaire($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getPartenaire() === $this) {
                $utilisateur->setPartenaire(null);
            }
        }

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Compte $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->setPartenaire($this);
        }

        return $this;
    }

    public function removeCompte(Compte $compte): self
    {
        if ($this->comptes->contains($compte)) {
            $this->comptes->removeElement($compte);
            // set the owning side to null (unless already changed)
            if ($compte->getPartenaire() === $this) {
                $compte->setPartenaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Envoi[]
     */
    public function getDateEnvoi(): Collection
    {
        return $this->date_envoi;
    }

    public function addDateEnvoi(Envoi $dateEnvoi): self
    {
        if (!$this->date_envoi->contains($dateEnvoi)) {
            $this->date_envoi[] = $dateEnvoi;
            $dateEnvoi->setAgence($this);
        }

        return $this;
    }

    public function removeDateEnvoi(Envoi $dateEnvoi): self
    {
        if ($this->date_envoi->contains($dateEnvoi)) {
            $this->date_envoi->removeElement($dateEnvoi);
            // set the owning side to null (unless already changed)
            if ($dateEnvoi->getAgence() === $this) {
                $dateEnvoi->setAgence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Retrait[]
     */
    public function getRetraits(): Collection
    {
        return $this->retraits;
    }

    public function addRetrait(Retrait $retrait): self
    {
        if (!$this->retraits->contains($retrait)) {
            $this->retraits[] = $retrait;
            $retrait->setAgence($this);
        }

        return $this;
    }

    public function removeRetrait(Retrait $retrait): self
    {
        if ($this->retraits->contains($retrait)) {
            $this->retraits->removeElement($retrait);
            // set the owning side to null (unless already changed)
            if ($retrait->getAgence() === $this) {
                $retrait->setAgence(null);
            }
        }

        return $this;
    }

}
