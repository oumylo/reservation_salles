<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\DTO\CreerReservationDTO;

class DatesReservationRegle implements ReservationRegleInterface
{
    public function verifier(CreerReservationDTO $dto): void
    {
        if ($dto->dateDebut >= $dto->dateFin) {
            throw new \InvalidArgumentException(
                'La date de début doit précéder la date de fin.'
            );
        }
    }
}

