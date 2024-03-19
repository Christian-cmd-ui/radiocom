<?php

namespace AppBundle\Controller;

use AppBundle\Service\FileUploader;
use AppBundle\Entity\Radios;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Radio controller.
 *
 */
class RadiosController extends Controller
{
    /**
     * @Route("/radios", name="radios_index")
     * 
     * Lists all radio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $radios = $em->getRepository('AppBundle:Radios')->findAll();

        return $this->render('radios/index.html.twig', array(
            'radios' => $radios,
        ));
    }

    /**
     * @Route("/radios/new", name="radios_new")
     * 
     * Creates a new radio entity.
     *
     */
    public function newAction(Request $request,  FileUploader $fileUploader)
    {
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

            return $this->redirectToRoute('radios_show', array('id' => $radio->getId()));
        }

        return $this->render('radios/new.html.twig', array(
            'radio' => $radio,
            'form' => $form->createView(),
        ));
    }

    /**
     * 
     *  @Route("/radios/{id}/show", name="radios_show")
     * 
     * Finds and displays a radio entity.
     *
     */
    public function showAction(Radios $radio)
    {
        $deleteForm = $this->createDeleteForm($radio);

        return $this->render('radios/show.html.twig', array(
            'radio' => $radio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/radios/{id}/edit", name="radios_edit")
     * 
     * Displays a form to edit an existing radio entity.
     *
     */
    public function editAction(Request $request, Radios $radio)
    {
        $deleteForm = $this->createDeleteForm($radio);
        $editForm = $this->createForm('AppBundle\Form\RadiosType', $radio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('radios_edit', array('id' => $radio->getId()));
        }

        return $this->render('radios/edit.html.twig', array(
            'radio' => $radio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/radios/{id}/delete", name="radios_delete")
     * 
     * Deletes a radio entity.
     *
     */
    public function deleteAction(Request $request, Radios $radio)
    {
        $form = $this->createDeleteForm($radio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($radio);
            $em->flush();
        }

        return $this->redirectToRoute('radios_index');
    }

    /**
     * Creates a form to delete a radio entity.
     *
     * @param Radios $radio The radio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Radios $radio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('radios_delete', array('id' => $radio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
