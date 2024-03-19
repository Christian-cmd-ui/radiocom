<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity
 * @ORM\Table(name="Radios")
 */

 class Radios {

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
  private $description;

  /**
   * @ORM\Column(type="float", length=100, nullable=true)
   * 
   */
  private $frequence;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   * 
   */
  private $pays;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   * 
   */
  private $village;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   * 
   */
  private $visuel;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   * 
   */
  private $langues;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   * 
   * indiquer ici si le produit est en stock ou non
   */
  private $horaires;
  /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Journalistes", mappedBy="radio")
     */
    private $journaliste;

    public function __construct()
    {
        $this->journaliste = new ArrayCollection();
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
   * Get the value of description
   */ 
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */ 
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get the value of frequence
   */ 
  public function getFrequence()
  {
    return $this->frequence;
  }

  /**
   * Set the value of frequence
   *
   * @return  self
   */ 
  public function setFrequence($frequence)
  {
    $this->frequence = $frequence;

    return $this;
  }

  /**
   * Get the value of village
   */ 
  public function getVillage()
  {
    return $this->village;
  }

  /**
   * Set the value of village
   *
   * @return  self
   */ 
  public function setVillage($village)
  {
    $this->village = $village;

    return $this;
  }

  /**
   * Get the value of langues
   */ 
  public function getLangues()
  {
    return $this->langues;
  }

  /**
   * Set the value of langues
   *
   * @return  self
   */ 
  public function setLangues($langues)
  {
    $this->langues = $langues;

    return $this;
  }

  /**
   * Get the value of horaires
   */ 
  public function getHoraires()
  {
    return $this->horaires;
  }

  /**
   * Set the value of horaires
   *
   * @return  self
   */ 
  public function setHoraires($horaires)
  {
    $this->horaires = $horaires;

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
    public function setJournalistes($journaliste)
    {
        $this->journaliste = $journaliste;

        return $this;
    }


    public function __toString() {
      return $this->nom;
    }
    

  /**
   * Get the value of visuel
   */ 
  public function getVisuel()
  {
    return $this->visuel;
  }

  /**
   * Set the value of visuel
   *
   * @return  self
   */ 
  public function setVisuel($visuel)
  {
    $this->visuel = $visuel;

    return $this;
  }
 }