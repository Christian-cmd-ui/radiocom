<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="evenements")
 */

 class Evenements {

    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", nullable=true)
   */
  private $image;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $titre;
  /**
   * @ORM\Column(type="text")
   */
  private $details;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $lieu;
  /**
   * @ORM\Column(type="boolean", nullable=true)
   * en actualite ou non
   */
  private $etat;
  /**
   * @ORM\Column(type="date")
   * date limite 
   */
  private $datedebut;
  /**
   * @ORM\Column(type="date")
   * date limite 
   */
  private $datefin;
  

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
   * Get en actualite ou non
   */ 
  public function getEtat()
  {
    return $this->etat;
  }

  /**
   * Set en actualite ou non
   *
   * @return  self
   */ 
  public function setEtat($etat)
  {
    $this->etat = $etat;

    return $this;
  }

  /**
   * Get the value of lieu
   */ 
  public function getLieu()
  {
    return $this->lieu;
  }

  /**
   * Set the value of lieu
   *
   * @return  self
   */ 
  public function setLieu($lieu)
  {
    $this->lieu = $lieu;

    return $this;
  }

  /**
   * Get the value of details
   */ 
  public function getDetails()
  {
    return $this->details;
  }

  /**
   * Set the value of details
   *
   * @return  self
   */ 
  public function setDetails($details)
  {
    $this->details = $details;

    return $this;
  }

  /**
   * Get the value of titre
   */ 
  public function getTitre()
  {
    return $this->titre;
  }

  /**
   * Set the value of titre
   *
   * @return  self
   */ 
  public function setTitre($titre)
  {
    $this->titre = $titre;

    return $this;
  }

  /**
   * Get the value of image
   */ 
  public function getImage()
  {
    return $this->image;
  }

  /**
   * Set the value of image
   *
   * @return  self
   */ 
  public function setImage($image)
  {
    $this->image = $image;

    return $this;
  }

  /**
   * Get date limite
   */
  public function getDatedebut()
  {
    return $this->datedebut;
  }

  /**
   * Set date limite
   */
  public function setDatedebut($datedebut)
  {
    $this->datedebut = $datedebut;

    return $this;
  }

  /**
   * Get date limite
   */
  public function getDatefin()
  {
    return $this->datefin;
  }

  /**
   * Set date limite
   */
  public function setDatefin($datefin)
  {
    $this->datefin = $datefin;

    return $this;
  }
 }


  