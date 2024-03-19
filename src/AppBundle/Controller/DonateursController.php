<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Donateurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Donateurs controller.
 *
 */
class DonateursController extends Controller
{
    /**
     * 
     * @Route("/donateurs", name="donateurs_index")
     *
     * Lists all donateurs entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $donateurs = $em->getRepository('AppBundle:Donateurs')->findAll();

        return $this->render('donateurs/index.html.twig', array(
            'donateurs' => $donateurs,
        ));
    }

    /**
     * @Route("/donateurs/new", name="donateurs_new")
     *
     * Lists all donateurs entities.
     *
     *
     */
    public function newAction(Request $request)
    {
        $donateur = new Donateurs();
        $form = $this->createForm('AppBundle\Form\DonateursType', $donateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($donateur);
            $em->flush();

            return $this->redirectToRoute('donateurs_show', array('id' => $donateur->getId()));
        }

        return $this->render('donateurs/new.html.twig', array(
            'donateur' => $donateur,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/donateurs/{id}/show", name="donateurs_show")
     *
     * Lists all donateurs entities.
     *
     *
     */
    public function showAction(Donateurs $donateur)
    {
        $deleteForm = $this->createDeleteForm($donateur);

        return $this->render('donateurs/show.html.twig', array(
            'donateur' => $donateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/donateurs/{id}/edit", name="donateurs_edit")
     *
     * Lists all donateurs entities.
     *
     *
     */
    public function editAction(Request $request, Donateurs $donateur)
    {
        $deleteForm = $this->createDeleteForm($donateur);
        $editForm = $this->createForm('AppBundle\Form\DonateursType', $donateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('donateurs_edit', array('id' => $donateur->getId()));
        }

        return $this->render('donateurs/edit.html.twig', array(
            'donateur' => $donateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/donateurs/{id}/delete", name="donateurs_delete")
     *
     * Lists all donateurs entities.
     *
     *
     */
    public function deleteAction(Request $request, Donateurs $donateur)
    {
        $form = $this->createDeleteForm($donateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($donateur);
            $em->flush();
        }

        return $this->redirectToRoute('donateurs_index');
    }

    /**
     * Creates a form to delete a donateur entity.
     *
     * @param Donateurs $donateur The donateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Donateurs $donateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('donateurs_delete', array('id' => $donateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
