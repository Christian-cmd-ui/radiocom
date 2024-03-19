<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Actualites")
 */

 class Actualites {

    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $image;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $titre;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $soustitre;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $contenu;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $auteur;
  /**
   * @ORM\Column(type="string", length=100)
   * en actualite ou non
   */
  private $etat;
  /**
   * @ORM\Column(type="date")
   */
  private $date;
  
  
  


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
   * Get the value of soustitre
   */ 
  public function getSoustitre()
  {
    return $this->soustitre;
  }

  /**
   * Set the value of soustitre
   *
   * @return  self
   */ 
  public function setSoustitre($soustitre)
  {
    $this->soustitre = $soustitre;

    return $this;
  }

  /**
   * Get the value of contenu
   */ 
  public function getContenu()
  {
    return $this->contenu;
  }

  /**
   * Set the value of contenu
   *
   * @return  self
   */ 
  public function setContenu($contenu)
  {
    $this->contenu = $contenu;

    return $this;
  }

  /**
   * Get the value of auteur
   */ 
  public function getAuteur()
  {
    return $this->auteur;
  }

  /**
   * Set the value of auteur
   *
   * @return  self
   */ 
  public function setAuteur($auteur)
  {
    $this->auteur = $auteur;

    return $this;
  }

  /**
   * Get the value of date
   */ 
  public function getDate()
  {
    return $this->date;
  }

  /**
   * Set the value of date
   *
   * @return  self
   */ 
  public function setDate($date)
  {
    $this->date = $date;

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
 }