<?php


namespace App\Controller\Register;



use App\Entity\AdminUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class registerController extends AbstractController
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function Register(){
        /**
         * @var AdminUser $adminuser
         */
        $adminuser = $this->getDoctrine()->getRepository(AdminUser::class)->findAll();
        return $this->forward('homepage/homepage.html.twig', array(['adminuser' => $adminuser]));
    }


    ///**
    //     * @Route("/register/user" , name="app_register_user")
    //     */
    //    public function newUser(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $userPasswordEncoder){
    //
    //        if ($request->isMethod('POST')){
    //         $Auser = new AdminUser();
    //         $Auser->setName($request->request->get('Name'));
    //            $Auser->setPassword($userPasswordEncoder->encodePassword($Auser,
    //                $request->request->get('password')));
    //         $Auser->setEmail($request->request->get('Email'));
    //         $Auser->setPhone($request->request->get('phone'));
    //
    //
    //        $em = $this->getDoctrine()->getManager();
    //        $em->persist($Auser);
    //        $em->flush();
    //        }
    //       return $this->render('Sample/sample.html.twig');
    //    }
}