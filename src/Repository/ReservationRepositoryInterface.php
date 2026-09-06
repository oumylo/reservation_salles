<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Reservation;
use DateTimeImmutable;

interface ReservationRepositoryInterface
{
    public function listerReservation(): array;

    public function trouverReservation(int $id): ?Reservation;

    public function rechercherConflit(
        int $salleId,
        DateTimeImmutable $dateDebut,
        DateTimeImmutable $dateFin
    ): ?Reservation;

    public function enregistrerReservation(
        Reservation $reservation
    ): Reservation;

    public function annulerReservation(
        Reservation $reservation
    ): Reservation;
}