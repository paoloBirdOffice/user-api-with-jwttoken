<?php

namespace App\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('pages/index.html.twig');
    }
 
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }
 
}