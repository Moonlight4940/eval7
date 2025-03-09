<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServiceRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findAll();
        $chartData = []; // Initialize as an empty array

        foreach ($services as $service) {
            $chartData[] = [
                'service' => $service->getNom(),
                'employeeCount' => count($service->getEmployes()),
            ];
        }

        return $this->render('home/index.html.twig', [
            'chartData' => $chartData,
            'home' => 'Notre entreprise à la taille humaine'
        ]);
    }
}