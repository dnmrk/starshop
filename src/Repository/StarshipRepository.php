<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    public function findAll(): array
    {
        $this->logger->info('Starships findAll..');

        return [
            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles I',
                StarshipStatusEnum::IN_PROGRESS,
            ),
            new Starship(
                2,
                'USS LeafyCruiser (NCC-0002)',
                'Garden',
                'Jean-Luc Pickles II',
                StarshipStatusEnum::COMPLETED,
            ),
            new Starship(
                3,
                'USS LeafyCruiser (NCC-0003)',
                'Garden',
                'Jean-Luc Pickles III',
                StarshipStatusEnum::WAITING,
            ),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ((int) $starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}
