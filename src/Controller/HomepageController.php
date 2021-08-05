<?php

namespace App\Controller;

use App\Entity\AdminUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="app_homepage")
     */
    public function index(): Response
    {
        $adminUsers = $this->getDoctrine()->getRepository(AdminUser::class)->findAll();
        return $this->render('homepage/homepage.html.twig', ['adminUsers'=>$adminUsers]);
    }

    /**
     * @Route("/homepage/user" , name="app_register_user")
     */
    public function newUser(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $userPasswordEncoder){

        if ($request->isMethod('POST')){
            $Auser = new AdminUser();
            $Auser->setName($request->request->get('Name'));
            $Auser->setPassword($userPasswordEncoder->encodePassword($Auser,
                $request->request->get('password')));
            $Auser->setEmail($request->request->get('Email'));
            $Auser->setPhone($request->request->get('phone'));


            $em = $this->getDoctrine()->getManager();
            $em->persist($Auser);
            $em->flush();
        }
        return $this->render('Sample/sample.html.twig');
    }
}
