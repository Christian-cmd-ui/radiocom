<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\File;
class RadiosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom')
        ->add('description', TextType::class,[
            'label' => 'Description de votre radio',
        ])
        ->add('frequence')
        ->add('pays')
        ->add('visuel', FileType::class,[
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
        ->add('village')
        ->add('langues')
        ->add('horaires');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Radios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_radios';
    }


}
