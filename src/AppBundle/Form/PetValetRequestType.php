<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PetValetRequestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serviceDate', 'date', array(
                'widget' => 'single_text',
            ))
            ->add('startTime', 'time', array(
                'widget' => 'single_text',
            ))
            ->add('endTime', 'time', array(
                'widget' => 'single_text',
            ))
            ->add('comments')
            ->add('latitude')
            ->add('longitude')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PetValetRequest'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pet_valet_request_type';
    }
}
