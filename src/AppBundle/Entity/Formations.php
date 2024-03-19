<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="Formations")
 */

 class Formations {

    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $libelle;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $objectifs;
  /**
   * @ORM\Column(type="integer", length=100)
   * 
   */
  private $duree;
  /**
   * @ORM\Column(type="string", length=100)
   * 
   */
  private $modaliteparticipation;
  /**
   * @ORM\Column(type="string", length=100)
   * en ligne, présentieml
   */
  private $type;
  /**
   * @ORM\Column(type="string", length=100)
   * 
   * indiquer ici si le produit est en stock ou non
   */
  private $nombreplace;
  /**
   * @ORM\Column(type="string", length=100)
   * 
   * indiquer les délais dans lesquelles le produit est attendu
   */
  private $lieu;

  

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
   * Get the value of libelle
   */ 
  public function getLibelle()
  {
    return $this->libelle;
  }

  /**
   * Set the value of libelle
   *
   * @return  self
   */ 
  public function setLibelle($libelle)
  {
    $this->libelle = $libelle;

    return $this;
  }

  /**
   * Get the value of objectifs
   */ 
  public function getObjectifs()
  {
    return $this->objectifs;
  }

  /**
   * Set the value of objectifs
   *
   * @return  self
   */ 
  public function setObjectifs($objectifs)
  {
    $this->objectifs = $objectifs;

    return $this;
  }

  /**
   * Get the value of duree
   */ 
  public function getDuree()
  {
    return $this->duree;
  }

  /**
   * Set the value of duree
   *
   * @return  self
   */ 
  public function setDuree($duree)
  {
    $this->duree = $duree;

    return $this;
  }

  /**
   * Get the value of modaliteparticipation
   */ 
  public function getModaliteparticipation()
  {
    return $this->modaliteparticipation;
  }

  /**
   * Set the value of modaliteparticipation
   *
   * @return  self
   */ 
  public function setModaliteparticipation($modaliteparticipation)
  {
    $this->modaliteparticipation = $modaliteparticipation;

    return $this;
  }

  /**
   * Get en ligne, présentieml
   */ 
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set en ligne, présentieml
   *
   * @return  self
   */ 
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get the value of nombreplace
   */ 
  public function getNombreplace()
  {
    return $this->nombreplace;
  }

  /**
   * Set the value of nombreplace
   *
   * @return  self
   */ 
  public function setNombreplace($nombreplace)
  {
    $this->nombreplace = $nombreplace;

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
 }