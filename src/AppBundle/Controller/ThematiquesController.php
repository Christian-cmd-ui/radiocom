<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Thematiques;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Thematique controller.
 *
 */
class ThematiquesController extends Controller
{
    /**
     * @Route("/thematiques", name="thematiques_index")
     * 
     * Lists all thematique entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $thematiques = $em->getRepository('AppBundle:Thematiques')->findAll();

        return $this->render('thematiques/index.html.twig', array(
            'thematiques' => $thematiques,
        ));
    }

    /**
     * @Route("/thematiques/new", name="thematiques_new")
     * 
     * Creates a new thematique entity.
     *
     */
    public function newAction(Request $request)
    {
        $thematique = new Thematiques();
        $form = $this->createForm('AppBundle\Form\ThematiquesType', $thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thematique);
            $em->flush();

            return $this->redirectToRoute('thematiques_show', array('id' => $thematique->getId()));
        }

        return $this->render('thematiques/new.html.twig', array(
            'thematique' => $thematique,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/thematiques/{id}/show", name="thematiques_show")
     * 
     * Finds and displays a thematique entity.
     *
     */
    public function showAction(Thematiques $thematique)
    {
        $deleteForm = $this->createDeleteForm($thematique);

        return $this->render('thematiques/show.html.twig', array(
            'thematique' => $thematique,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/thematiques/{id}/edit", name="thematiques_edit")
     * 
     * Displays a form to edit an existing thematique entity.
     *
     */
    public function editAction(Request $request, Thematiques $thematique)
    {
        $deleteForm = $this->createDeleteForm($thematique);
        $editForm = $this->createForm('AppBundle\Form\ThematiquesType', $thematique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('thematiques_edit', array('id' => $thematique->getId()));
        }

        return $this->render('thematiques/edit.html.twig', array(
            'thematique' => $thematique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/thematiques/{id}/delete", name="thematiques_delete")
     * 
     * Deletes a thematique entity.
     *
     */
    public function deleteAction(Request $request, Thematiques $thematique)
    {
        $form = $this->createDeleteForm($thematique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($thematique);
            $em->flush();
        }

        return $this->redirectToRoute('thematiques_index');
    }

    /**
     * Creates a form to delete a thematique entity.
     *
     * @param Thematiques $thematique The thematique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Thematiques $thematique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('thematiques_delete', array('id' => $thematique->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
