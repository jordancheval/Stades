<?php

namespace Stades\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class UserManagementController extends Controller
{
    public function indexAction()
    {
        return new Response('GESTION UTILISATEURS');
    }
    
    public function listUsersAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        
        $users = $userManager->findUsers();
        
        return $this->render('StadesUserBundle:User:listUser.html.twig', array(
            'users' => $users
        ));
    }
}