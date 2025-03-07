<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    //http://127.0.0.1:8000/
    #[Route('/', name: 'app_home')]
    
    public function index(ServiceRepository $serviceRepository): Response
{
    $services = $serviceRepository->findAll();
    $chartData = [];
foreach ($services as $service) {
    $chartData= [
        'service' => $service->getNom(),
        'employeeCount' => count($service->getEmployes()),
    ];
}
    return $this->render('home/index.html.twig', [
        
        'chartData' => $chartData,
        'home' => 'Bonjour!'
    ]);
}
}
