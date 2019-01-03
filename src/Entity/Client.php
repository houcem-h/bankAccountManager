<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    public function getId() : ? int
    {
        return $this->id;
    }

    public function getNom() : ? string
    {
        return $this->nom;
    }

    public function setNom(string $nom) : self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom() : ? string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom) : self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance() : ? \DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance) : self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getAdresse() : ? string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse) : self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel() : ? int
    {
        return $this->tel;
    }

    public function setTel(int $tel) : self
    {
        $this->tel = $tel;

        return $this;
    }
}
