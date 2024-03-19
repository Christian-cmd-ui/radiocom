<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Journalistes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Journaliste controller.
 *
 */
class JournalistesController extends Controller
{
    /**
     * @Route("/journalistes", name="journalistes_index")
     * 
     * Lists all journaliste entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $journalistes = $em->getRepository('AppBundle:Journalistes')->findAll();

        return $this->render('journalistes/index.html.twig', array(
            'journalistes' => $journalistes,
        ));
    }

    /**
     * @Route("/journalistes/new", name="journalistes_new")
     * 
     * Creates a new journaliste entity.
     *
     */
    public function newAction(Request $request)
    {
        $journaliste = new Journalistes();
        $form = $this->createForm('AppBundle\Form\JournalistesType', $journaliste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($journaliste);
            $em->flush();

            return $this->redirectToRoute('journalistes_show', array('id' => $journaliste->getId()));
        }

        return $this->render('journalistes/new.html.twig', array(
            'journaliste' => $journaliste,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/journalistes/{id}/show", name="journalistes_show")
     * 
     * Finds and displays a journaliste entity.
     *
     */
    public function showAction(Journalistes $journaliste)
    {
        $deleteForm = $this->createDeleteForm($journaliste);

        return $this->render('journalistes/show.html.twig', array(
            'journaliste' => $journaliste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * 
     * @Route("/journalistes/{id}/edit", name="journalistes_edit")
     * 
     * Displays a form to edit an existing journaliste entity.
     *
     */
    public function editAction(Request $request, Journalistes $journaliste)
    {
        $deleteForm = $this->createDeleteForm($journaliste);
        $editForm = $this->createForm('AppBundle\Form\JournalistesType', $journaliste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('journalistes_edit', array('id' => $journaliste->getId()));
        }

        return $this->render('journalistes/edit.html.twig', array(
            'journaliste' => $journaliste,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/journalistes/{id}/delete", name="journalistes_delete")
     * 
     * Deletes a journaliste entity.
     *
     */
    public function deleteAction(Request $request, Journalistes $journaliste)
    {
        $form = $this->createDeleteForm($journaliste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($journaliste);
            $em->flush();
        }

        return $this->redirectToRoute('journalistes_index');
    }

    /**
     * Creates a form to delete a journaliste entity.
     *
     * @param Journalistes $journaliste The journaliste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Journalistes $journaliste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('journalistes_delete', array('id' => $journaliste->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
