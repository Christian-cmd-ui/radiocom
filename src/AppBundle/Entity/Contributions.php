<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="contributions")
 * 
 */

 class Contributions {

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * 
   */

  private $id;
  /**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Thematiques", inversedBy="contribution")
   */
  private $theme;
  /**
   * @ORM\Column(type="string")
   */
  private $contributeur;
  /**
   * @ORM\Column(type="text")
   */
  private $contributions;
  /**
   * @ORM\Column(type="date")
   */

  private $date;
  /**
   * @ORM\Column(type="boolean")
   */

  private $enable;
    /**
   * @ORM\Column(type="string", length=100, nullable=true)
   * 
   */
  private $visuel;
  
  
 public function __construct() {
 
  $this->enable = false;
  
 }

 

  /**
   * Get the value of date
   */ 
  public function __toString()
  {
    return $this->id;
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
   * Get the value of contributeur
   */ 
  public function getContributeur()
  {
    return $this->contributeur;
  }

  /**
   * Set the value of contributeur
   *
   * @return  self
   */ 
  public function setContributeur($contributeur)
  {
    $this->contributeur = $contributeur;

    return $this;
  }



  /**
   * Get the value of theme
   */ 
  public function getTheme()
  {
    return $this->theme;
  }

  /**
   * Set the value of theme
   *
   * @return  self
   */ 
  public function setTheme($theme)
  {
    $this->theme = $theme;

    return $this;
  }
  


  /**
   * Get the value of contributions
   */
  public function getContributions()
  {
    return $this->contributions;
  }

  /**
   * Set the value of contributions
   */
  public function setContributions($contributions)
  {
    $this->contributions = $contributions;

    return $this;
  }

  /**
   * Get the value of enable
   */
  public function getEnable()
  {
    return $this->enable;
  }

  /**
   * Set the value of enable
   */
  public function setEnable($enable)
  {
    $this->enable = $enable;

    return $this;
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