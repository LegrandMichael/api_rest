<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateReceipt', DateTimeType::class, array(
                'widget' => 'single_text',
                'input' => 'datetime',
            ))
            ->add('userConcerned')
            ->add('theme')
            ->add('priorityLevel')
            ->add('deadline', DateTimeType::class, array(
                'widget' => 'single_text',
                'input' => 'datetime',
            ))
            ->add('publicConcerned')
            ->add('goal')
            ->add('broadcasting')
            ->add('answer')
            ->add('treatedBy')
            ->add('state')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Task',
            'csrf_protection' => false
        ]);
    }
}