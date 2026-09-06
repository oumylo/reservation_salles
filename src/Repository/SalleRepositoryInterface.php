<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Salle;

interface SalleRepositoryInterface
{
    public function listerSalle(): array;

    public function trouverSalle(int $id): ?Salle;

    public function enregistrerSalle(Salle $salle): Salle;
}