<?php

namespace Stades\StadesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Stades\StadesBundle\Form\StadesType;


class StadesSearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('adresseStade')
            ->remove('lienMaps')
            ->remove('typeTerrain')
            ->remove('save')
            ->remove('reset')
            ->add('submit', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'stades_stadesbundle_stades_search';
    }
    
    public function getParent()
    {
        return new StadesType();
    }
}
