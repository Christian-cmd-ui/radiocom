<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Mails
 * 
 * @ORM\Entity
 * @ORM\Table(name="mails")
 */
class Mails
{
    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  /**
   * @ORM\Column(type="string")
   */
  private $destinataire;
  /**
   * @ORM\Column(type="string", nullable=true)
   */
  private $object;
  /**
   * @var \DateTime
   * 
   * @ORM\Column(type="date", nullable=true)
   */

  private $datepublication;
  /**
   * @ORM\Column(type="string", nullable=true)
   */
  private $contenu;


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
   * Get the value of destinataire
   */ 
  public function getDestinataire()
  {
    return $this->destinataire;
  }

  /**
   * Set the value of destinataire
   *
   * @return  self
   */ 
  public function setDestinataire($destinataire)
  {
    $this->destinataire = $destinataire;

    return $this;
  }

  /**
   * Get the value of object
   */ 
  public function getObject()
  {
    return $this->object;
  }

  /**
   * Set the value of object
   *
   * @return  self
   */ 
  public function setObject($object)
  {
    $this->object = $object;

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
   * @return  \DateTime
   */ 
  public function setDatepublication(\DateTime $datepublication)
  {
    $this->datepublication = $datepublication;

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
}


