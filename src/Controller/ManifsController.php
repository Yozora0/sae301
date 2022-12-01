<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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

    #[Route('/manifs/{id}', name: 'manifs_show', methods: ['GET'])]
    public function show(Manifs $manifs): Response
    {
        return $this->render('manifs/show.html.twig', [
            'manifs' => $manifs ,
        ]);
    }

    #[Route(path: '/manifs', name: 'app_manifs')]
    public function searchBar(ManifsRepository $manifsRepository)
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_search'))
            ->add('search', TextType::class)
            ->getForm();

        $manifs = $manifsRepository->findAll();

        return $this->render('manifs/index.html.twig', [
            'form' => $form->createView(),
            'manifs' => $manifs
        ]);
    }

    #[Route(path: '/search', name: 'app_search')]
    public function search( Request $request, ManifsRepository $ManifestationRepository)
    {
        $search = $request->request->all('form')['search'];
        $result = $ManifestationRepository->findManifsRepository($search);
        return $this->render('manifs/search.html.twig', [
            'search' => $result
        ]);
    }



}
