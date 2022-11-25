<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Manifs;
use App\Repository\ManifsRepository;
use Doctrine\ORM\EntityManagerInterface;

class ManifsController extends AbstractController
{
    #[Route('/manifs', name: 'app_manifs')]
    public function listeManifs(ManifsRepository $ManifsRepository)
    {
        $manifs = $ManifsRepository->findAll();


        return $this->render('manifs/index.html.twig', [
            'manifs' => $manifs,
        ]);
    }

    #[Route('/{id}', name: 'manifs_show', methods: ['GET'])]
    public function show(ManifsRepository $ManifsRepository): Response
    {
        return $this->render('manifs/show.html.twig', [
            'manifs_repository' => $ManifsRepository ,
        ]);
    }


}
