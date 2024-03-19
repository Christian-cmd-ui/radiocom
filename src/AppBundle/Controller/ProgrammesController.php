<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Programmes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Programme controller.
 *
 */
class ProgrammesController extends Controller
{
    /**
     * 
     * @Route("/programmes", name="programmes_index")
     * 
     * Lists all programme entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $programmes = $em->getRepository('AppBundle:Programmes')->findAll();

        return $this->render('programmes/index.html.twig', array(
            'programmes' => $programmes,
        ));
    }

    /**
     * 
     * @Route("/programmes/new", name="programmes_new")
     * 
     * Creates a new programme entity.
     *
     */
    public function newAction(Request $request)
    {
        $programme = new Programmes();
        $form = $this->createForm('AppBundle\Form\ProgrammesType', $programme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($programme);
            $em->flush();

            return $this->redirectToRoute('programmes_show', array('id' => $programme->getId()));
        }

        return $this->render('programmes/new.html.twig', array(
            'programme' => $programme,
            'form' => $form->createView(),
        ));
    }

    /**
     * 
     * @Route("/programmes/{id}/show", name="programmes_show")
     * 
     * Finds and displays a programme entity.
     *
     */
    public function showAction(Programmes $programme)
    {
        $deleteForm = $this->createDeleteForm($programme);

        return $this->render('programmes/show.html.twig', array(
            'programme' => $programme,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * 
     *  @Route("/programmes/{id}/edit", name="programmes_edit")
     * 
     * Displays a form to edit an existing programme entity.
     *
     */
    public function editAction(Request $request, Programmes $programme)
    {
        $deleteForm = $this->createDeleteForm($programme);
        $editForm = $this->createForm('AppBundle\Form\ProgrammesType', $programme);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('programmes_edit', array('id' => $programme->getId()));
        }

        return $this->render('programmes/edit.html.twig', array(
            'programme' => $programme,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/programmes/{id}/delete", name="programmes_delete")
     * 
     * Deletes a programme entity.
     *
     */
    public function deleteAction(Request $request, Programmes $programme)
    {
        $form = $this->createDeleteForm($programme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($programme);
            $em->flush();
        }

        return $this->redirectToRoute('programmes_index');
    }

    /**
     * Creates a form to delete a programme entity.
     *
     * @param Programmes $programme The programme entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Programmes $programme)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('programmes_delete', array('id' => $programme->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
