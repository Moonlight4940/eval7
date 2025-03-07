<?php

namespace App\Controller;

use App\Entity\Employe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    //http://127.0.0.1:8000/
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        
        return $this->render('home/index.html.twig', [
            'home' => 'HomeController',
        ]);
    }
}
