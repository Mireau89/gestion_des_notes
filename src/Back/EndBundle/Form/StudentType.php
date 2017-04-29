<?php

namespace Back\EndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('insCode', null, array('label' => 'Code Inscription *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('firstName', null, array('label' => 'First Name *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('lastName', null, array('label' => 'Last Name *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('age', null, array('label' => 'Age *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('gender', null, array('label' => 'Gender *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\EndBundle\Entity\Student'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'back_endbundle_student';
    }


}
