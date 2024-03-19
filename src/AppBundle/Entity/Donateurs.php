<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="Donateurs")
 */

 class Donateurs {

    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $nom;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $prenom;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $email;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $sexe;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $phone;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $pays;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $montant;
  
  

  /**
   * Get the value of montant
   */ 
  public function getMontant()
  {
    return $this->montant;
  }

  /**
   * Set the value of montant
   *
   * @return  self
   */ 
  public function setMontant($montant)
  {
    $this->montant = $montant;

    return $this;
  }

  /**
   * Get the value of pays
   */ 
  public function getPays()
  {
    return $this->pays;
  }

  /**
   * Set the value of pays
   *
   * @return  self
   */ 
  public function setPays($pays)
  {
    $this->pays = $pays;

    return $this;
  }

  /**
   * Get the value of phone
   */ 
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * Set the value of phone
   *
   * @return  self
   */ 
  public function setPhone($phone)
  {
    $this->phone = $phone;

    return $this;
  }

  /**
   * Get the value of nom
   */ 
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */ 
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of prenom
   */ 
  public function getPrenom()
  {
    return $this->prenom;
  }

  /**
   * Set the value of prenom
   *
   * @return  self
   */ 
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;

    return $this;
  }

  /**
   * Get the value of sexe
   */ 
  public function getSexe()
  {
    return $this->sexe;
  }

  /**
   * Set the value of sexe
   *
   * @return  self
   */ 
  public function setSexe($sexe)
  {
    $this->sexe = $sexe;

    return $this;
  }
 }