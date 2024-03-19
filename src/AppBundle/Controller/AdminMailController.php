<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Emails;
use AppBundle\Form\EmailsType;
use AppBundle\Service\EmailSender;
use AppBundle\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdminDefaultController
 * @package AppBundle\Controller
 * @Route("/admin")
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 */
class AdminMailController extends AbstractController {
  /**
   * @var EntityManagerInterface
   */
  private $manager;

  /**
   * AdminDefaultController constructor.
   * @param EntityManagerInterface $manager
   */
  public function __construct(EntityManagerInterface $manager) {
    $this->manager = $manager;
  }

  /**
   * @Route("/supervision/mails/list", name="list_all_mails_sent", methods={"GET"})
   * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
   * @return RedirectResponse|Response
   */
  public function mailsList() {
    return $this->render('admin/mail/list_mails_admin.html.twig', [
      'email_link' => 'admin_email_list',
      'emails' => $this->manager->getRepository(Emails::class)->findAll(),
    ]);
  }

  /**
   * @Route("/send/mail", name="send_mail_admin", methods={"GET", "POST"})
   * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
   * @param Request $request
   * @param EmailSender $emailSender
   * @param FileUploader $fileUploader
   * @return RedirectResponse|Response
   */
  public function sendMail(Request $request, EmailSender $emailSender, FileUploader $fileUploader) {
    $email = new Emails();
    $form = $this->createForm(EmailsType::class, $email);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      if (empty($email->getContent())) {
        $this->addFlash('warning', "Le contenu du mail ne doit pas être vide");
        return $this->render('admin/mail/send_mail.html.twig', [
          'email' => $email->getEmailDestinataire(),
          'subject' => $email->getObjectMail(),
          'form' => $form->createView(),
        ]);
      }

      $file = $form['imageFile']->getData();
      if ($file) {
        $extensions = array('jpg', 'png', 'jpeg');
        if (!in_array($file->guessExtension(), $extensions)) {
          $this->addFlash('warning', ' Fichier image invalide');
          return $this->render('admin/mail/send_mail.html.twig', [
            'email' => $email->getEmailDestinataire(),
            'subject' => $email->getObjectMail(),
            'form' => $form->createView(),
          ]);
        }
        $fileName = $fileUploader->upload($file, 'emails');
        $email->setImageFile($fileName);
      }

      $this->manager->persist($email);
      $this->manager->flush();

      //Envoie du mail
      $emailSender->sendMails('reseaujcac@gmail.com', $email->getEmailDestinataire(), $email->getObjectMail(), $email->getContent(), null, null, $email->getImageFile());
      $this->addFlash('info', 'Le mail a été envoyé avec succès.');
      return $this->redirectToRoute('list_all_mails_sent');
    }
    return $this->render('admin/mail/send_mail.html.twig', [
      'email_link' => 'email_index',
      'form' => $form->createView(),
    ]);
  }

}
