<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\DTO\CreerReservationDTO;
use App\Exception\SalleIndisponibleException;
use App\Repository\SalleRepositoryInterface;

class SalleActiveRegle implements ReservationRegleInterface
{
    public function __construct(
        private SalleRepositoryInterface $salleRepository
    ) {
    }

    public function verifier(CreerReservationDTO $dto): void
    {
        $salle = $this->salleRepository->trouverSalle($dto->salleId);

        if ($salle === null) {
            throw new SalleIndisponibleException(
                'La salle demandée est introuvable.'
            );
        }

        if (!$salle->active) {
            throw new SalleIndisponibleException(
                'La salle est inactive et ne peut pas être réservée.'
            );
        }
    }
}
