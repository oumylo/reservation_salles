<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Salle;

class SalleRepository implements SalleRepositoryInterface
{
    public function listerSalle(): array
    {
        return Salle::query()->get()->all();
    }

    public function trouverSalle(int $id): ?Salle
    {
        return Salle::query()->find($id);
    }

    public function enregistrerSalle(Salle $salle): Salle
    {
        $salle->save();

        return $salle;
    }
}