<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\DTO\CreerReservationDTO;
use App\Exception\SalleIndisponibleException;
use App\Repository\ReservationRepositoryInterface;

class ConflitReservationRegle implements ReservationRegleInterface
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository
    ) {
    }

    public function verifier(CreerReservationDTO $dto): void
    {

        $conflit = $this->reservationRepository->rechercherConflit(
            $dto->salleId,
            $dto->dateDebut,
            $dto->dateFin
        );

        if ($conflit !== null) {
            throw new SalleIndisponibleException(
                'La salle est déjà réservée pendant cette période.'
            );
        }
    }
}
