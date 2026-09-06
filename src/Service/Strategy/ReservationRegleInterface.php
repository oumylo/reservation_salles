<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\DTO\CreerReservationDTO;

interface ReservationRegleInterface
{
    public function verifier(CreerReservationDTO $dto): void;
}
