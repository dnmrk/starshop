<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $starshipRepository): Response
    {
        $starShips = $starshipRepository->findAll();

        return $this->json($starShips);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $starshipRepository): Response
    {
        $starShip = $starshipRepository->find($id);

        if (!$starShip) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starShip);
    }
}
