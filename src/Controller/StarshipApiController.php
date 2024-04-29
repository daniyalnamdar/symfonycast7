<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', name: 'app_starship_api', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {
        $starships = $repository->findAllOf();

        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', name: 'app_starship_api_get', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository): Response
    {
        $starship = $repository->findId($id);
        if (!$starship) {
            throw $this->createNotFoundException('Starships not found');
        }

        return $this->json($starship);
    }
}
