<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
      /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Attestations", mappedBy="user")
     */
    public $attestations;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=4096)
     */
    protected $plainPassword;


    // other properties and methods

    public function __construct() {
        $this->enabled = true;
    }
    
      public function __toString()
      {
    
        return $this->username;
      }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

 


    public function eraseCredentials()
    {
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }



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
    public function set(array $attestations)
    {
        $this->attestations = array();
        foreach ($attestations as $attestation) {       

        if (!in_array($attestation, $this->attestations, true)) {
            $this->attestations[] = $attestation;
        }
        }

        

        return $this;
    }
}