<?php

namespace Back\EndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Nom *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('abbr', null, array('label' => 'Abbréviation *' , 'required' => true, 'attr' => array('class' => 'form-control '  , 'placeholder' => 'Enter...')))
            ->add('coeff', null, array('label' => 'Coefficient *' , 'required' => true, 'attr' => array('class' => 'form-control '  , 'placeholder' => 'Enter...')))
            ->add('module', null, array('label' => 'Module *' , 'required' => true, 'attr' => array('class' => 'form-control '  )))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\EndBundle\Entity\Element'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'back_endbundle_element';
    }


}
