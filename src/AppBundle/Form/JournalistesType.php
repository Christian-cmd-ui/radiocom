<?php

namespace AppBundle\Form;

use AppBundle\Entity\Radios;
use AppBundle\Entity\Programmes;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class JournalistesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
        ->add('email')
        ->add('phone')
        ->add('ville')
        ->add('pays')
        ->add('cni', FileType::class,[
            'data_class' => null,
            'required'   => false,
            'label' => 'Votre CNI en image recto-verso (png, jpeg)',
            'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => ["image/png", "image/jpeg", "image/jpg", "image/gif"],
                    'mimeTypesMessage' => 'formats autorisés: png, jpeg, jpg, gif'
                  
                ])
            ],
            ])
        ->add('recommandations', FileType::class,[
            'data_class' => null,
            'required'   => false,
            'label' => 'Recommandation de la radio concernée (png, jpeg)',
            'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => ["image/png", "image/jpeg", "image/jpg", "image/gif"],
                    'mimeTypesMessage' => 'formats autorisés: png, jpeg, jpg, gif'
                  
                ])
            ],
            ])
        ->add('langues')
        ->add('radio', EntityType::class, [
            'label' => 'Nom de la radio',
            'class' => Radios::class,
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Journalistes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_journalistes';
    }


}
