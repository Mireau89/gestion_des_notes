<?php

namespace Back\EndBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModuleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('name', null, array('label' => 'Nom *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('abbr', null, array('label' => 'Abbréviation *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))
            ->add('elementNbr', null, array('label' => 'Nombre des élements *' , 'required' => true, 'attr' => array('class' => 'form-control ' , 'placeholder' => 'Enter...')))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Back\EndBundle\Entity\Module'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'back_endbundle_module';
    }


}
