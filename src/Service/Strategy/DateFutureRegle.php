<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\DTO\CreerReservationDTO;

class DateFutureRegle implements ReservationRegleInterface
{
    public function verifier(CreerReservationDTO $dto): void
    {

        $maintenant = new \DateTimeImmutable();

        if ($dto->dateDebut <= $maintenant) {
            throw new \InvalidArgumentException(
                'La date de début de la réservation doit être dans le futur.'
            );
        }
    }
}
