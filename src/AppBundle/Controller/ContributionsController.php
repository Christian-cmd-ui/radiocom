<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contributions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contribution controller.
 *
 */
class ContributionsController extends Controller
{
    /**
     * @Route("/dashboard/contributions", name="contributions_index")
     * 
     * Lists all contribution entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contributions = $em->getRepository('AppBundle:Contributions')->findAll();

        return $this->render('contributions/index.html.twig', array(
            'contributions' => $contributions,
        ));
    }

    /**
     * @Route("/dashboard/contributions/new", name="contributions_new")
     * 
     * Creates a new contribution entity.
     *
     */
    public function newAction(Request $request)
    {
        $contribution = new Contributions();
        $form = $this->createForm('AppBundle\Form\ContributionsType', $contribution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contribution);
            $em->flush();

            return $this->redirectToRoute('contributions_show', array('id' => $contribution->getId()));
        }

        return $this->render('contributions/new.html.twig', array(
            'contribution' => $contribution,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/dashboard/contributions/{id}/show", name="contributions_show")
     * 
     * Finds and displays a contribution entity.
     *
     */
    public function showAction(Contributions $contribution)
    {
        $deleteForm = $this->createDeleteForm($contribution);

        return $this->render('contributions/show.html.twig', array(
            'contribution' => $contribution,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/dashboard/contributions/{id}/edit", name="contributions_edit")
     * 
     * Displays a form to edit an existing contribution entity.
     *
     */
    public function editAction(Request $request, Contributions $contribution)
    {
        $deleteForm = $this->createDeleteForm($contribution);
        $contribution->setVisuel($contribution->getVisuel());
        $editForm = $this->createForm('AppBundle\Form\ContributionsType', $contribution);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contributions_edit', array('id' => $contribution->getId()));
        }

        return $this->render('contributions/edit.html.twig', array(
            'contribution' => $contribution,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/dashboard/contributions/{id}/delete", name="contributions_delete")
     * 
     * Deletes a contribution entity.
     *
     */
    public function deleteAction(Request $request, Contributions $contribution)
    {
        $form = $this->createDeleteForm($contribution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contribution);
            $em->flush();
        }

        return $this->redirectToRoute('contributions_index');
    }

    /**
     * Creates a form to delete a contribution entity.
     *
     * @param Contributions $contribution The contribution entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contributions $contribution)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contributions_delete', array('id' => $contribution->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
