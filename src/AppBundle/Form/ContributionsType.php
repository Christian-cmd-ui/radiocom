<?php

namespace AppBundle\Form;

use AppBundle\Entity\Thematiques;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ContributionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contributeur')->add('contributions')->add('visuel', FileType::class,[
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
            ])->add('date', DateType::class)->add('enable')
            ->add('theme', EntityType::class,
            ['class' => Thematiques::class]
            );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contributions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contributions';
    }


}
