<?php

namespace Stades\StadesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StadesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomStade', 'text', array('required' => true))
            ->add('adresseStade', 'text', array('required' => false))
            ->add('latitude', 'number', array(
                    'required' => true,
                    'precision' => 6,
                    'invalid_message' => 'Veuillez indiquer une latitude valide'
              ))
            ->add('longitude', 'number', array(
                    'required' => true,
                    'precision' => 6,
                    'invalid_message' => 'Veuillez indiquer une longitude valide'
              ))
            ->add('typeTerrain', 'entity', array(
                'class' => 'StadesStadesBundle:TypeTerrain',
                'property' => 'typeTerrain',
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ))
            ->add('save', 'submit')
            ->add('reset', 'reset')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Stades\StadesBundle\Entity\Stades'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'stades_stadesbundle_stades';
    }
}
