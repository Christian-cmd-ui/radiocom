<?php

namespace AppBundle\Form;

use AppBundle\Entity\Destinataire;
use AppBundle\Entity\Emails;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EmailsType
 * @package AppBundle\Form
 */
class EmailsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emailDestinataire', EmailType::class, [
            'label' => 'Email du Destinataire'
        ])
            ->add('objectMail', TextType::class, [
            'label' => 'Objet du mail'
        ])
        ->add('content', TextareaType::class, [
            'label' => "Contenu du mail"
        ])
        ->add('imageFile', FileType::class, [
            'label' => 'Fichier Image(Format png/jpeg)',
            'attr' => [
                'class' => 'form-control'
            ],
            'required' => false
        ])
        ->add('categorieDestinataire', EntityType::class, [
            'label' => 'Catégorie destinataire',
            'class' => Destinataire::class
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Emails::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_bundle_emails';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_bundle_emails';
    }
}
