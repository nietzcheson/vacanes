<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DayRequestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', 'date', array(
                'widget' => 'single_text',
            ))
            ->add('endDate', 'date', array(
                'widget' => 'single_text',
            ))
            ->add('startTime', 'time', array(
                'widget' => 'single_text',
            ))
            ->add('endTime', 'time', array(
                'widget' => 'single_text',
            ))
            ->add('comments')
            ->add('serviceType')
            ->add('serviceDays')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DayRequest'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'day_request_type';
    }
}
