<?php

namespace AppBundle\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Destinataire
 *
 * @ORM\Table(name="destinataire_mails")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DestinataireRepository")
 * @UniqueEntity(fields={"nom"}, message="Un destinataire est déjà enregistré avec cette référence")
 * @ORM\HasLifecycleCallbacks()
 */
class Destinataire
{
    use Timestamps;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description; // description

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->nom;
    }

    /**
     * Destinataire constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return  (new Slugify())->slugify($this->nom);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}

