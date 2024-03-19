<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * 
 * Formation controller.
 *
 */
class FormationsController extends Controller
{
    /**
     * 
     * @Route("/formations", name="formations_index")
     * Lists all formation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('AppBundle:Formations')->findAll();

        return $this->render('formations/index.html.twig', array(
            'formations' => $formations,
        ));
    }

    /**
     * @Route("/formations/new", name="formations_new")
     * 
     * Creates a new formation entity.
     *
     */
    public function newAction(Request $request)
    {
        $formation = new Formations();
        $form = $this->createForm('AppBundle\Form\FormationsType', $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('formations_show', array('id' => $formation->getId()));
        }

        return $this->render('formations/new.html.twig', array(
            'formation' => $formation,
            'form' => $form->createView(),
        ));
    }

    /**
     * 
     *  @Route("/formations/{id}/show", name="formations_show")
     * 
     * Finds and displays a formation entity.
     *
     */
    public function showAction(Formations $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);

        return $this->render('formations/show.html.twig', array(
            'formation' => $formation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     *  @Route("/formations/{id}/edit", name="formations_edit")
     * 
     * Displays a form to edit an existing formation entity.
     *
     */
    public function editAction(Request $request, Formations $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);
        $editForm = $this->createForm('AppBundle\Form\FormationsType', $formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formations_edit', array('id' => $formation->getId()));
        }

        return $this->render('formations/edit.html.twig', array(
            'formation' => $formation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * * @Route("/formations/{id}/delete", name="formations_delete")
     * 
     * Deletes a formation entity.
     *
     */
    public function deleteAction(Request $request, Formations $formation)
    {
        $form = $this->createDeleteForm($formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formation);
            $em->flush();
        }

        return $this->redirectToRoute('formations_index');
    }

    /**
     * Creates a form to delete a formation entity.
     *
     * @param Formations $formation The formation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Formations $formation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formations_delete', array('id' => $formation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
