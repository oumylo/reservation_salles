<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\CreerReservationDTO;
use App\Model\Reservation;
use App\Repository\ReservationRepositoryInterface;
use App\Service\Strategy\ReservationRegleInterface;

class CreerReservationService
{
  
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository,
        private array $regles
    ) {
    }

  
    public function executer(CreerReservationDTO $dto): Reservation
    {

        foreach ($this->regles as $regle) {
            $regle->verifier($dto);
        }

        $reservation = new Reservation();

        $reservation->salle_id = $dto->salleId;
        $reservation->responsable = $dto->responsable;
        $reservation->email = $dto->email;
        $reservation->motif = $dto->motif;
        $reservation->date_debut = $dto->dateDebut;
        $reservation->date_fin = $dto->dateFin;

        $reservation->statut = 'confirmée';

        return $this->reservationRepository->enregistrerReservation(
            $reservation
        );
    }
}