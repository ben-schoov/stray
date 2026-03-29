<?php

namespace App\Controller;

use App\Repository\PlaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PlaceRepository $placeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'app_name' => 'Stray',
            'tagline' => 'Discover interesting places in Leuven',
            'places' => $placeRepository->findAll(),
        ]);
    }

    #[Route('/place/{slug}', name: 'app_place_detail')]
    public function detail(string $slug, PlaceRepository $placeRepository): Response
    {
        $place = $placeRepository->findOneBy(['slug' => $slug]);

        if (!$place) {
            throw $this->createNotFoundException('Place not found');
        }

        return $this->render('place/detail.html.twig', [
            'place' => $place,
        ]);
    }
}
