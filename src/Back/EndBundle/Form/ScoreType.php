<?php

namespace Back\EndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScoreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('testScore', null, array('label' => 'Note *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('student', null, array('label' => 'Student *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('element', null, array('label' => 'Element *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))

        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\EndBundle\Entity\Score'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'back_endbundle_score';
    }


}
