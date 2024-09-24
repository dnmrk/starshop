<?php

namespace App\Controller;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('api/starships')]
    public function getCollection(LoggerInterface $logger): Response
    {
        $logger->info('Starships get collection');

        $starShips = [
            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles I',
                'under construction',
            ),
            new Starship(
                2,
                'USS LeafyCruiser (NCC-0002)',
                'Garden',
                'Jean-Luc Pickles II',
                'under construction',
            ),
            new Starship(
                3,
                'USS LeafyCruiser (NCC-0003)',
                'Garden',
                'Jean-Luc Pickles III',
                'under construction',
            ),
        ];

        return $this->json($starShips);
    }
}
