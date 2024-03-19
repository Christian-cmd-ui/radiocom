<?php

namespace AppBundle\Controller;

use DateTime;
use AppBundle\Entity\User;
use AppBundle\Entity\Mails;
use AppBundle\Entity\Radios;
use AppBundle\Form\UserType;
use AppBundle\Entity\Evenements;
use FOS\UserBundle\FOSUserEvents;
use AppBundle\Entity\Journalistes;
use AppBundle\Entity\Contributions;
use AppBundle\Entity\Thematiques;
use AppBundle\Service\FileUploader;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Csrf\CsrfToken;

class DefaultController extends Controller
{

    private $tokenManager;
    private $eventDispatcher;
    private $formFactory;
    private $userManager;
    private $tokenStorage;


    public function __construct(CsrfTokenManagerInterface $tokenManager = null)
    {
        $this->tokenManager = $tokenManager;
    }
/**
   * @Route("/{_locale}",
   *  defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   },  name="homepage")
    *
    * @param Request $request
    * @param $_locale
    * @return Response
   * 
   * 
   *  
   */
    public function indexAction(Request $request, $_locale)
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');
    
        $mails = new Mails();
        $form = $this->createForm('AppBundle\Form\MailsType', $mails);
        $form->handleRequest($request);
        $date = new \DateTime('now');

        if ($form->isSubmitted() && $form->isValid()) {

            $mails->setDatepublication($date);
            $em = $this->getDoctrine()->getManager();
            $em->persist($mails);
            $em->flush();

            $this->sendMailToAdmin($mails);
            $this->addFlash('newsletter', 'Votre adresse a été correctement enregistrée');
            return $this->redirectToRoute('homepage');
        }
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'mails' => $mails,
            'form' => $form->createView(),
            'currentroute' => $routeName,
        ]);
    }
     /**
   *  @Route("/{_locale}/devenir-membre",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="devenirmembre")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

  
    public function devenirmembreAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need*
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $radio = new Radios();
        $form = $this->createForm('AppBundle\Form\RadiosType', $radio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($radio);
            $em->flush();

            return $this->redirectToRoute('homepage', array('id' => $radio->getId()));
        } 
        return $this->render('default/devenirmembre.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'radio' => $radio,
            'form' => $form->createView(),
            'currentroute' => $routeName,
        ]);
    }

     /**
   *  @Route("/{_locale}/contact",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="contact")
    * @param Request $request
    * @param $_locale
    * @return Response
    */


    public function contactAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');
        return $this->render('default/contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }

         /**
   *  @Route("/{_locale}/attestation_T",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="attestation_T")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function attestation_TAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $entityManager = $this->getDoctrine()->getManager();
        
        // Récupérer l'utilisateur depuis la base de données (par exemple)
        $user = $this->getUser();
        return $this->render('default/attestation_T.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'user' => $user,
            'currentroute' => $routeName,
        ]);
    }
    
    /**
   *  @Route("/{_locale}/actualites",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="actualites")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function actualiteAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/actualites.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }

    /**
   *  @Route("/{_locale}/missions-du-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="missions")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function missionsAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/missions.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }

       /**
   *  @Route("/{_locale}/objectifs-du-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="objectifs")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function objectifsAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/objectifs.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }

      /**
   *  @Route("/{_locale}/description-forum",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="detailsforum")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function descriptionforumAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/details_forum.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }
    /**
   *  @Route("/{_locale}/equipe-du-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="equipe")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function equipeAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/equipe.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }
 /**
   *  @Route("/{_locale}/annonces-sur-le-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="annonces")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function annoncesAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/annonces.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }
/**
   *  @Route("/{_locale}/opportunites-sur-le-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="opportunites")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function opportunitesAction(Request $request)
    {
   
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle:Evenements')->findAll();
        // replace this example code with whatever you need
        

        return $this->render('default/opportunites.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'evenements' => $events,
            
        ]);
    }
    /**
   *  @Route("/{_locale}/opportunites-sur-le-reseau/{id}/show",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="opportunites_details")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function opportunitesdetailleesAction(Request $request, Evenements $event, $_locale)
    {
       
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/opportunites_details.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'evenement' => $event,
            'currentroute' => $routeName,
        ]);
    }

     /**
   *  @Route("/{_locale}/ressources-du-journaliste",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="ressources")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function ressourcesAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/ressources.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }

     /**
   *  @Route("/{_locale}/soutenir-le-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="soutenir")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function soutenirAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/soutenir.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }

     /**
   *  @Route("/{_locale}/historique-du-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="historique")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function historiqueAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/historique.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ]);
    }

/**
   *  @Route("/{_locale}/Liste-des-radios-membres",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="radiosmembre")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function radiosmembreAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $em = $this->getDoctrine()->getManager();

        $radios = $em->getRepository('AppBundle:Radios')->findAll();

        return $this->render('default/radiosmembre.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'radios' => $radios,
            'currentroute' => $routeName,
        ]);
    }

/**
   *  @Route("/{_locale}/Liste-des-journalistes-membres",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="journalistes")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function journalistesmembreAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $em = $this->getDoctrine()->getManager();

        $journalistes = $em->getRepository('AppBundle:Journalistes')->findAll();

        return $this->render('default/journalistes.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'journalistes' => $journalistes,
            'currentroute' => $routeName,
        ]);
    }
/**
   *  @Route("/{_locale}/foire-aux-questions",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="forum")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function forumAction(Request $request, $_locale)
    {
        $em = $this->getDoctrine()->getManager();
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');
        
        
        
        $contrib = new Contributions();
        $user = new User();
        $date = new DateTime();
        $theme = new Thematiques();
        
        $contributions = $em->getRepository('AppBundle:Contributions')->findAll();
        $thematiques = $em->getRepository('AppBundle:Thematiques')->findAll();
      
        $csrfToken = $this->tokenManager
        ? $this->tokenManager->getToken('authenticate')->getValue()
        : null;
        $contrib->setContributeur($this->get('security.token_storage')->getToken()->getUser());
       
        $contrib->setDate($date);
        $contrib->setEnable(false);
        $contrib->setContributions($request->request->get('contributions'));
      
        $userform = $this->createForm(UserType::class, $user);
        $userform->handleRequest($request);
        
        
        if ( $request->request->get('theme') != null ) {

            $theme = $em->getRepository('AppBundle:Thematiques')->find($request->request->get('theme'));
            
       
            $contrib->setTheme($theme[0]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrib);
            $em->flush();

            $this->addFlash('info', 'Votre contribution a été correctement enregistrée ! Elle est en attente de validation par un administrateur du reseau...');
            return $this->redirectToRoute('forum');
        }
        
        if ($userform->isSubmitted() && $userform->isValid()) {

            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('info', 'Votre compte a été correctement cree. ');
            return $this->redirectToRoute('forum');
        }
    
     
        
        return $this->render('default/forum.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'thematiques' => $thematiques,
            'contributions' => $contributions,
            'userform' => $userform->createView(),
            'csrf_token'=> $csrfToken,
            'currentroute' => $routeName,
        ]);
    }
    /**
   *  @Route("/{_locale}/dashboard",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="dashboard")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function adminAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $em = $this->getDoctrine()->getManager();

        $radios = $em->getRepository('AppBundle:Radios')->findAll();
        $journalistes = $em->getRepository('AppBundle:Journalistes')->findAll();
        $formations = $em->getRepository('AppBundle:Formations')->findAll();
        $donateurs = $em->getRepository('AppBundle:Donateurs')->findAll();

        return $this->render('admin/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'radios' => count($radios),
            'journalistes' => count($journalistes),
            'formations' => count($formations),
            'donateurs' => count($donateurs),
            'currentroute' => $routeName,
        ]);
    }
       /**
   *  @Route("/{_locale}/contributions",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="contributions")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

  
    public function contributionsAction(Request $request, $_locale)
    {
        // replace this example code with whatever you need
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $contributions = new Contributions();
        $contributions->setContributeur($this->get('security.token_storage')->getToken()->getUser());
        $form = $this->createForm('AppBundle\Form\ContributionsType', $contributions);
        $form->handleRequest($request); // replace this example code with whatever you need
        
        
        if ($form->isSubmitted() && $form->isValid()) {

            
            $em = $this->getDoctrine()->getManager();
            $em->persist($contributions);
            $em->flush();

            $this->addFlash('info', 'Votre contribution a été correctement enregistrée');
            return $this->redirectToRoute('forum');
        }

        return $this->render('default/contributions.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'form' => $form->createView(),
            'currentroute' => $routeName,
        ]);
    }

      /**
   *  @Route("/{_locale}/ajouter-une-radio",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="ajouterradio")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function addradioAction(Request $request,  FileUploader $fileUploader, $_locale)
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $radio = new Radios();
        $form = $this->createForm('AppBundle\Form\RadiosType', $radio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                /** @var UploadedFile $visuel radio */
                $visuel = $form->get('visuel')->getData();
                    if ($visuel) {
                        $visuelradio = $fileUploader->upload($visuel);
                        $radio->setVisuel($visuelradio);
                    }

            $em = $this->getDoctrine()->getManager();
            $em->persist($radio);
            $em->flush();
            $this->addFlash('radio', 'Votre radio a été correctement enregistrée');
            return $this->redirectToRoute('ajouterradio');
        }
        
        return $this->render('default/devenirmembre.html.twig', array(
            'radio' => $radio,
            'form' => $form->createView(),
            'currentroute' => $routeName,
        ));
    }
    
    
      /**
   *  @Route("/{_locale}/devenir-un-journaliste-membre",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="ajouterjournaliste")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function addjournalisteAction(Request $request,  FileUploader $fileUploader, $_locale)
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $journaliste = new Journalistes();
        $form = $this->createForm('AppBundle\Form\JournalistesType', $journaliste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                /** @var UploadedFile $cni radio */

                $cni = $form->get('cni')->getData();
                    if ($cni) {
                        $fichiercni = $fileUploader->upload($cni);
                        $journaliste->setCni($fichiercni);
                    }
                
                /** @var UploadedFile $recommandation radio */
                $recommandation = $form->get('recommandations')->getData();
                    if ($recommandation) {
                        $fichierrecom = $fileUploader->upload($recommandation);
                        $journaliste->setRecommandations($fichierrecom);
                    }

            $em = $this->getDoctrine()->getManager();
            $em->persist($journaliste);
            $em->flush();
            
            $this->addFlash('journaliste', 'Journaliste correctement enregistrée. Finalisez votre enregistrement en creant votre compte pour contribuer au forum de discussion !');
            return $this->redirectToRoute('fos_user_registration_register');
        }
        
        return $this->render('default/devenirjournaliste.html.twig', array(
            'journaliste' => $journaliste,
            'form' => $form->createView(),
            'currentroute' => $routeName,
        ));
    }
    
      /**
   *  @Route("/{_locale}/a-propos",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="apropos")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function aproposAction(Request $request, $_locale)
    {
       
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        return $this->render('default/apropos.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ));
    }

     /**
   *  @Route("/{_locale}/calendrier-des-evenements",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="activites")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function calendrierAction(Request $request, $_locale )
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository('AppBundle:Evenements')->findAll();
        return $this->render('default/activites.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'evenements' => $evenements,
        ));
    }
    
     /**
   *  @Route("/{_locale}/nos-partenaires",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="partenaires")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function partenaireAction(Request $request, $_locale )
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');

       
        return $this->render('default/partenaires.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ));
    }

     
     /**
   *  @Route("/{_locale}/pays_membres",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="pays_membres")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function pays_membresAction(Request $request, $_locale )
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');
        return $this->render('default/pays_membres.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ));
    }
 /**
   *  @Route("/{_locale}/les-avantages-du-reseau",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="avantages")
    * @param Request $request
    * @param $_locale
    * @return Response
    */

    public function avantagesAction(Request $request, $_locale )
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');
        return $this->render('default/avantages.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ));
    }
     /**
   *  @Route("/{_locale}/comment-contribuer-a-une-thématique-ouverte",
    * defaults={
    *       "_locale": "fr",
    *   },
    *   requirements={
    *       "_locale": "en|fr",
    *   }, name="commentcontribuer")
    * @param Request $request
    * @param $_locale
    * @return Response
    */
    
    public function commentcontribuerAction(Request $request, $_locale )
    {
        $request->setLocale($_locale);
        $routeName = $request->attributes->get('_route');
        return $this->render('default/commentcontribuer.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'currentroute' => $routeName,
        ));
    }

 /**
   * @param $mails
   * 
   */
  public function sendMailToAdmin($mails) {
    try {
      $message = \Swift_Message::newInstance()
        ->setFrom(['contact@reseau-jcac.net' => 'JCAC Newsletters - Valorisons le journalisme communautaire'])
        ->setTo('contact@reseau-jcac.net')
        ->setCc($mails->getDestinataire())
        ->setCharset('utf-8')
        ->setContentType('text/html')
        ->setSubject("Inscription à la newsletter du JCAC")
        ->setBody($this->renderView('default/mail.html.twig', [
          'mails' => $mails,
        ]));
      $this->get('mailer')->send($message);
    } catch (\Throwable $th) {}
  }
    
}
