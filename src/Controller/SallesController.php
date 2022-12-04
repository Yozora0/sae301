<?php

namespace App\Controller;

use App\Entity\Salles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SallesRepository;

class SallesController extends AbstractController
{
    #[Route('/salles', name: 'app_salles')]
    public function listeSalles(SallesRepository $salleRepository)
    {
        $salles = $salleRepository->findAll();

        return $this->render('salles/index.html.twig', [
            'salles' => $salles
        ]);
    }
}
