<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\DTO\CreerReservationDTO;

class DureeReservationRegle implements ReservationRegleInterface
{
    public function verifier(CreerReservationDTO $dto): void
    {
        
        $duree = $dto->dateFin->getTimestamp() - $dto->dateDebut->getTimestamp();

        if ($duree > 4 * 60 * 60) {
            throw new \InvalidArgumentException(
                'La durée de la réservation ne peut pas dépasser 4 heures.'
            );
        }
    }
}
