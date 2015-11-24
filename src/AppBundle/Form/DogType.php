<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DogType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('dogSize')
            ->add('dogBreed')
            ->add('dogPhoto')
            ->add('dogPhoto', 'collection', array(
                'type' => new DogPhotoType(),
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,

            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Dog',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dog_type';
    }
}
