<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emails
 *
 * @ORM\Table(name="emails")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmailsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Emails {
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
   * @var \DateTime
   *
   * @ORM\Column(name="date", type="datetime")
   */
  private $date;

  /**
   * @var string
   *
   * @ORM\Column(name="email_destinataire", type="string")
   */
  private $emailDestinataire;

  /**
   * @var string
   *
   * @ORM\Column(name="object_mail", type="string")
   */
  private $objectMail;

  /**
   * @var string
   *
   * @ORM\Column(name="content", type="text")
   */
  private $content;

  /**
   * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Destinataire")
   */
  private $categorieDestinataire;

  /**
   * @var string
   *
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $imageFile;

  /**
   * Emails constructor.
   */
  public function __construct() {
    $this->date = new \DateTime();
  }

  /**
   * Get id
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Set date
   *
   * @param \DateTime $date
   *
   * @return Emails
   */
  public function setDate($date) {
    $this->date = $date;

    return $this;
  }

  /**
   * Get date
   *
   * @return \DateTime
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * @return string
   */
  public function getEmailDestinataire() {
    return $this->emailDestinataire;
  }

  /**
   * @param string $emailDestinataire
   */
  public function setEmailDestinataire($emailDestinataire) {
    $this->emailDestinataire = $emailDestinataire;
  }

  /**
   * @return string
   */
  public function getObjectMail() {
    return $this->objectMail;
  }

  /**
   * @param string $objectMail
   */
  public function setObjectMail($objectMail) {
    $this->objectMail = $objectMail;
  }

  /**
   * @return string
   */
  public function getContent() {
    return $this->content;
  }

  /**
   * @param string $content
   */
  public function setContent($content) {
    $this->content = $content;
  }

  /**
   * @return Destinataire
   */
  public function getCategorieDestinataire() {
    return $this->categorieDestinataire;
  }

  /**
   * @param Destinataire $categorieDestinataire
   */
  public function setCategorieDestinataire($categorieDestinataire) {
    $this->categorieDestinataire = $categorieDestinataire;
  }

  /**
   * @return string
   */
  public function getImageFile() {
    return $this->imageFile;
  }

  /**
   * @param string $imageFile
   */
  public function setImageFile($imageFile) {
    $this->imageFile = $imageFile;
  }
}
