<?php

namespace Stades\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
        ;
    }
    
    public function getParent()
    {
        return 'fos_user_profile_edit';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'stades_userbundle_user';
    }
}
