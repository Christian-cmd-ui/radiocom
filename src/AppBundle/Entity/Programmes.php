<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="programmes")
 */

 class Programmes {

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $heures;
  /**
   * @ORM\Column(type="string", length=100)
   * 
   */
  private $nom;
  /**
   * @ORM\Column(type="string", length=100)
   * 
   */
  private $emission;
  /**
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\Journalistes", mappedBy="programme")
    */
  private $journaliste;

  

  public function __toString() {
    return $this->nom;
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
   * Get the value of heures
   */ 
  public function getHeures()
  {
    return $this->heures;
  }

  /**
   * Set the value of heures
   *
   * @return  self
   */ 
  public function setHeures($heures)
  {
    $this->heures = $heures;

    return $this;
  }

  /**
   * Get the value of emission
   */ 
  public function getEmission()
  {
    return $this->emission;
  }

  /**
   * Set the value of emission
   *
   * @return  self
   */ 
  public function setEmission($emission)
  {
    $this->emission = $emission;

    return $this;
  }

    /**
     * Get the value of journaliste
     */ 
    public function getJournaliste()
    {
        return $this->journaliste;
    }

    /**
     * Set the value of journaliste
     *
     * @return  self
     */ 
    public function setJournaliste($journaliste)
    {
        $this->journaliste = $journaliste;

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
 }