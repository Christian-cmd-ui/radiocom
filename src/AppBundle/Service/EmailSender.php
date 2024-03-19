<?php

// AppBundle/Service/EmailSender.php
namespace AppBundle\Service;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class EmailSender
 * @package AppBundle\Service
 */
class EmailSender extends Controller {
  /**
   * @param $email
   * @param null $sender
   * @param null $subject
   * @param null $text
   * @param null $attachment1
   * @param null $attachment2
   * @param null $image
   * @internal param Utilisateur $user  
   */
  public function sendMails($email, $sender = null, $subject = null, $text = null, $attachment1 = null, $attachment2 = null, $image = null) {
    $hostname = getenv('HTTP_HOST');
    
    if (!empty($image)) {
      $data['image'] = $image;
    }
    //Initialisation du message
    $message = \Swift_Message::newInstance()
      ->setFrom([$sender => 'CECOSDAFormation - Centre de formation professionnel'])
    /* @var $user Utilisateur */
      ->setTo($email)
      ->setCc($sender)
      ->setCharset('utf-8')
      ->setContentType('text/html')
      ->setSubject($subject != null ? $subject : 'Greetings')
      ->setBody($this->renderView('mail/mailTemplate.html.twig', ['user' => $text]));
    if ($attachment1) {
      $message->attach(\Swift_Attachment::fromPath($hostname . '/' . $attachment1));
    }
    if ($attachment2) {
      $message->attach(\Swift_Attachment::fromPath($hostname . '/' . $attachment2));
    }
    //Envoie du message
    $this->get('mailer')->sendMails($message);
  }

}