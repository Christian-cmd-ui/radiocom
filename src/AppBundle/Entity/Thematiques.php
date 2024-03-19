<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="thematiques")
 */

 class Thematiques {

    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string")
   */
  private $titre;
  /**
   * @ORM\Column(type="string")
   */
  private $delais;
  /**
   * @ORM\Column(type="date")
   */

  private $datepublication;
   /**
   * @ORM\OneToMany(targetEntity="AppBundle\Entity\Contributions", mappedBy="theme")
   */
  private $contribution;

  
  public function __toString()
  {

    return $this->titre;
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
   * Get the value of datepublication
   */ 
  public function getDatepublication()
  {
    return $this->datepublication;
  }

  /**
   * Set the value of datepublication
   *
   * @return  self
   */ 
  public function setDatepublication($datepublication)
  {
    $this->datepublication = $datepublication;

    return $this;
  }

  /**
   * Get the value of delais
   */ 
  public function getDelais()
  {
    return $this->delais;
  }

  /**
   * Set the value of delais
   *
   * @return  self
   */ 
  public function setDelais($delais)
  {
    $this->delais = $delais;

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
   * Get the value of contribution
   */ 
  public function getContribution()
  {
    return $this->contribution;
  }

  /**
   * Set the value of contribution
   *
   * @return  self
   */ 
  public function setContribution($contribution)
  {
    $this->contribution = $contribution;

    return $this;
  }
 }