<?php

namespace App\Controller\Admin;



use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController{


    /**
     * @Route("/admin" , name="app_admin")
     */
    public function admin(): Response
    {
        $products = $this->getDoctrine()->getRepository(Products::class)->findAll();
        return $this->render('Admin/navBarAdmin.html.twig', ['products'=>$products]);
    }

    /**
     * @Route("/admin/new_product", name="new_product")
     */
    public function product(Request $request, EntityManagerInterface $em){

        if($request->isMethod('POST')){
            $product = new Products();
            $product->setProductName($request->request->get('product_name'));
            $product->setProductDescription($request->request->get('product_description'));
            $product->setMagasins($request->request->get('magazine'));
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return $this->render('homepage/homepage.html.twig');

    }

    ///**
    //     * @Route("/admin/new_product/display_content", name="display_content")
    //     */
    //    public function  getProduct(){
    //
    //        $products = $this->getDoctrine()->getRepository(Products::class)->findAll();
    //        return $this->render('Admin/navBarAdmin.html.twig', ['products'=>$products]);
    //    }
}

