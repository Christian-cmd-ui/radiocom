<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EvenementsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('image', FileType::class,[
            'data_class' => null,
            'required'   => false,
            'label' => 'Photo de votre radio (png, jpeg)',
            'constraints' => [
                new File([
                    'maxSize' => '1024k',
                    'mimeTypes' => ["image/png", "image/jpeg", "image/jpg", "image/gif"],
                    'mimeTypesMessage' => 'formats autorisés: png, jpeg, jpg, gif'
                  
                ])
            ],
            ])
        ->add('titre')
        ->add('details')
        ->add('lieu')
        ->add('etat')
        ->add('datedebut')
        ->add('datefin');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evenements'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_evenements';
    }


}
