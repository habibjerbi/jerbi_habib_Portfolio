<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(): Response
    {
        return $this->render('navigation/index.html.twig');
    }
    /**
     * @Route("/about", name="navigation/about")
     */
    public function about(): Response
    {
        return $this->render('navigation/about.html.twig');
    }

    /**
     * @Route("/blog", name="navigation/blog")
     */
    public function blog(): Response
    {
        return $this->render('navigation/blog.html.twig');
    }

    /**
     * @Route("/contact", name="navigation/contact")
     */
    public function contact(): Response
    {
        return $this->render('navigation/contact.html.twig');
    }

}
