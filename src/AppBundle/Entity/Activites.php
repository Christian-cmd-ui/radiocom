<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Activites")
 */

 class Activites {

    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $titre;
  /**
   * @ORM\Column(type="date")
   */
  private $datedebut;
  /**
   * @ORM\Column(type="date")
   */
  private $datefin;
  
  /**
   * @ORM\Column(type="text")
   */
  private $resume;
  /**
   * @ORM\Column(type="array")
   */
  private $photos;
  /**
   * @ORM\Column(type="array")
   */
  private $citations;
  /**
   * @ORM\Column(type="array")
   * en actualite ou non
   */
  private $rapport;
  /**
   * @ORM\Column(type="array")
   */
  private $support;
  
  
  



  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   */
  public function setId($id): self
  {
    $this->id = $id;

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
   */
  public function setTitre($titre): self
  {
    $this->titre = $titre;

    return $this;
  }

  /**
   * Get the value of datedebut
   */
  public function getDatedebut()
  {
    return $this->datedebut;
  }

  /**
   * Set the value of datedebut
   */
  public function setDatedebut($datedebut)
  {
    $this->datedebut = $datedebut;

    return $this;
  }

  /**
   * Get the value of datefin
   */
  public function getDatefin()
  {
    return $this->datefin;
  }

  /**
   * Set the value of datefin
   */
  public function setDatefin($datefin)
  {
    $this->datefin = $datefin;

    return $this;
  }

  /**
   * Get the value of resume
   */
  public function getResume()
  {
    return $this->resume;
  }

  /**
   * Set the value of resume
   */
  public function setResume($resume)
  {
    $this->resume = $resume;

    return $this;
  }

  /**
   * Get the value of photos
   */
  public function getPhotos()
  {
    return $this->photos;
  }

  /**
   * Set the value of photos
   */
  public function setPhotos($photos)
  {
    $this->photos = $photos;

    return $this;
  }

  /**
   * Get the value of citations
   */
  public function getCitations()
  {
    return $this->citations;
  }

  /**
   * Set the value of citations
   */
  public function setCitations($citations)
  {
    $this->citations = $citations;

    return $this;
  }

  /**
   * Get en actualite ou non
   */
  public function getRapport()
  {
    return $this->rapport;
  }

  /**
   * Set en actualite ou non
   */
  public function setRapport($rapport)
  {
    $this->rapport = $rapport;

    return $this;
  }

  /**
   * Get the value of support
   */
  public function getSupport()
  {
    return $this->support;
  }

  /**
   * Set the value of support
   */
  public function setSupport($support)
  {
    $this->support = $support;

    return $this;
  }
 }