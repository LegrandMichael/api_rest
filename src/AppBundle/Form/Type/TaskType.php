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
        $builder->add('dateReceipt', DateTimeType::class);
        $builder->add('theme');
        $builder->add('priorityLevel');
        $builder->add('deadline', DateTimeType::class);
        $builder->add('publicConcerned');
        $builder->add('goal');  
        $builder->add('broadcasting');
        $builder->add('answer');
        $builder->add('state');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Task',
            'csrf_protection' => false
        ]);
    }
}