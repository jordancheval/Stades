<?php

namespace Stades\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use FOS\UserBundle\Model\UserManagerInterface;

class UserAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $passwordoptions = array(
            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => 'form.password'),
            'second_options' => array('label' => 'form.password_confirmation'),
            'invalid_message' => 'fos_user.password.mismatch',
        );
        
        $this->record_id = $this->request->get($this->getIdParameter());
        
        if (!empty($this->record_id)) {
            // Si l'utilisateur existe on ne modifie par forcément son mot de passe
            $passwordoptions['required'] = false;
        } else {
            // Si l'utilisateur n'existe pas, le mot de passe est obligatoire
            $passwordoptions['required'] = true;
        }
        
        $formMapper
            ->add('username')
            ->add('firstName', 'text')
            ->add('lastName', 'text')
            ->add('email' )
            ->add('plainPassword', 'repeated', $passwordoptions)
            ->add('enabled', null, array('required' => false))
            ->add('locked', null, array('required' => false))
            ->add('roles', 'choice',
                array('choices'=>
                    array('ROLE_USER' => 'Utilisateur',
                        'ROLE_SUPER_ADMIN' => 'Administrateur'),
                    'expanded'=> true,
                    'multiple'=> true));

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('lastLogin')
            ->add('locked')
            ->add('roles')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('username')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('locked')
            ->add('lastLogin')
            ->add('roles')
        ;


    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('locked')
            ->add('lastLogin')
            ->add('roles')
        ;
    }
    
    public function preUpdate($user)
    {
        $this->getUserManager()->updateCanonicalFields($user);
        $this->getUserManager()->updatePassword($user);
    }

    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @return UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->userManager;
    }
}
