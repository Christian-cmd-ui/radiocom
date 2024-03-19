<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Attestations")
 */

 class Attestations {

    /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
   /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="Attestations")
     *
     */
    private $user;
   /**
   * @ORM\Column(type="array")
   */
  private $attestations;
 
  
  
  

  /**
   * Get the value of attestations
   */ 
  public function getAttestations()
  {
    return $this->attestations;
  }

   
    /**
     * {@inheritdoc}
     */
    public function setAttestations(array $files)
    {
        $this->attestations = array();
        foreach ($files as $attestation) {
       

        if (!in_array($attestation, $this->attestations, true)) {
            $this->attestations[] = $attestation;
        }
        }

        

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

   

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

 
 }