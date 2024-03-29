<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evenements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Evenement controller.
 *
 */
class EvenementsController extends Controller
{
    /**
     * @Route("/evenements", name="evenements_index")
     * Lists all evenement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('AppBundle:Evenements')->findAll();

        return $this->render('evenements/index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * @Route("/evenements/new", name="evenements_new")
     * Creates a new evenement entity.
     *
     */
    public function newAction(Request $request)
    {
        $evenement = new Evenements();
        $form = $this->createForm('AppBundle\Form\EvenementsType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('evenements_show', array('id' => $evenement->getId()));
        }

        return $this->render('evenements/new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/evenements/{id}/show", name="evenements_show")
     * Finds and displays a evenement entity.
     *
     */
    public function showAction(Evenements $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('evenements/show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/evenements/{id}/edit", name="evenements_edit")
     * Displays a form to edit an existing evenement entity.
     *
     */
    public function editAction(Request $request, Evenements $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('AppBundle\Form\EvenementsType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenements_edit', array('id' => $evenement->getId()));
        }

        return $this->render('evenements/edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/evenements/{id}/delete", name="evenements_delete")
     * Deletes a evenement entity.
     *
     */
    public function deleteAction(Request $request, Evenements $evenement)
    {
        $form = $this->createDeleteForm($evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenement);
            $em->flush();
        }

        return $this->redirectToRoute('evenements_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenements $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenements $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenements_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
