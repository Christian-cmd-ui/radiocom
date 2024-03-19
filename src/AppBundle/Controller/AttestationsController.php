<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Attestations;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Attestation controller.
 *
 */
class AttestationsController extends Controller
{
    /**
     * @Route("/attestations", name="attestations_index")
     * Lists all attestation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $attestations = $em->getRepository('AppBundle:Attestations')->findAll();

        return $this->render('attestations/index.html.twig', array(
            'attestations' => $attestations,
        ));
    }

    /**
     * @Route("/attestations/new", name="attestations_new")
     * Creates a new attestation entity.
     *
     */
    public function newAction(Request $request)
    {
        $attestation = new Attestations();
        $form = $this->createForm('AppBundle\Form\AttestationsType', $attestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($attestation);
            $em->flush();

            return $this->redirectToRoute('attestations_show', array('id' => $attestation->getId()));
        }

        return $this->render('attestations/new.html.twig', array(
            'attestation' => $attestation,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/attestations/{id}/show", name="attestations_show")
     * Finds and displays a attestation entity.
     *
     */
    public function showAction(Attestations $attestation)
    {
        $deleteForm = $this->createDeleteForm($attestation);

        return $this->render('attestations/show.html.twig', array(
            'attestation' => $attestation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/attestations/{id}/edit", name="attestations_edit")
     * Displays a form to edit an existing attestation entity.
     *
     */
    public function editAction(Request $request, Attestations $attestation)
    {
        $deleteForm = $this->createDeleteForm($attestation);
        $editForm = $this->createForm('AppBundle\Form\AttestationsType', $attestation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('attestations_edit', array('id' => $attestation->getId()));
        }

        return $this->render('attestations/edit.html.twig', array(
            'attestation' => $attestation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/attestations/{id}/delete", name="attestations_delete")
     * Deletes a attestation entity.
     *
     */
    public function deleteAction(Request $request, Attestations $attestation)
    {
        $form = $this->createDeleteForm($attestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($attestation);
            $em->flush();
        }

        return $this->redirectToRoute('attestations_index');
    }

    /**
     * Creates a form to delete a attestation entity.
     *
     * @param Attestations $attestation The attestation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Attestations $attestation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('attestations_delete', array('id' => $attestation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
