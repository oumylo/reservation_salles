<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Reservation;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function listerReservation(): array
    {
        return Reservation::query()->get()->all();
    }

    public function trouverReservation(int $id): ?Reservation
    {
        return Reservation::query()->find($id);
    }

    public function rechercherConflit(
        int $salleId,
        \DateTimeImmutable $dateDebut,
        \DateTimeImmutable $dateFin
    ): ?Reservation {
    return Reservation::query()
        ->where('salle_id', $salleId)
        ->where('statut', 'confirmée')
        ->where('date_debut', '<', $dateFin->format('Y-m-d H:i:s'))
        ->where('date_fin', '>', $dateDebut->format('Y-m-d H:i:s'))
        ->first();
    }

    public function enregistrerReservation(Reservation $reservation): Reservation
    {
        $reservation->save();

        return $reservation;
    }
    public function annulerReservation(Reservation $reservation): Reservation
    {
        $reservation->statut = 'annulée';

        $reservation->save();

        return $reservation;
    }
}  