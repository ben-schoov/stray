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

    #[Route('/places', name: 'app_places')]
    public function places(PlaceRepository $placeRepository): Response
    {
        return $this->render('places/index.html.twig', [
            'places' => $placeRepository->findAll(),
        ]);
    }

    #[Route('/routes', name: 'app_routes')]
    public function routes(): Response
    {
        return $this->render('routes/index.html.twig');
    }

    #[Route('/events', name: 'app_events')]
    public function events(): Response
    {
        return $this->render('events/index.html.twig');
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        return $this->render('profile/index.html.twig');
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
