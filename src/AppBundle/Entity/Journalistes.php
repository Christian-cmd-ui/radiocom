<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Table(name="Journalistes")
 * @ORM\Entity
 * 
 */

 class Journalistes {

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
  private $email;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $phone;
  /**
   * @ORM\Column(type="string", length=100)
   */
  private $ville;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   */
  private $pays;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   */
  private $cni;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   */
  private $recommandations;
  /**
   * @ORM\Column(type="string", length=100, nullable=true)
   * 
   */
  private $langues;

  /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Radios", inversedBy="journaliste")
     *
     */
  private $radio;
   /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Programmes", inversedBy="journaliste")
     * 
     */
  private $programme;
  

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
   * Get the value of ville
   */ 
  public function getVille()
  {
    return $this->ville;
  }

  /**
   * Set the value of ville
   *
   * @return  self
   */ 
  public function setVille($ville)
  {
    $this->ville = $ville;

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
     * Get the value of radio
     */ 
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * Set the value of radio
     *
     * @return  self
     */ 
    public function setRadio($radio)
    {
        $this->radio = $radio;

        return $this;
    }

  /**
   * Get the value of programme
   */ 
  public function getProgramme()
  {
    return $this->programme;
  }

  /**
   * Set the value of programme
   *
   * @return  self
   */ 
  public function setProgramme($programme)
  {
    $this->programme = $programme;

    return $this;
  }

  

  /**
   * Get the value of cni
   */ 
  public function getCni()
  {
    return $this->cni;
  }

  /**
   * Set the value of cni
   *
   * @return  self
   */ 
  public function setCni($cni)
  {
    $this->cni = $cni;

    return $this;
  }

  /**
   * Get the value of recommandations
   */ 
  public function getRecommandations()
  {
    return $this->recommandations;
  }

  /**
   * Set the value of recommandations
   *
   * @return  self
   */ 
  public function setRecommandations($recommandations)
  {
    $this->recommandations = $recommandations;

    return $this;
  }
 }