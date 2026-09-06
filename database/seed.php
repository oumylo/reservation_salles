<?php

declare(strict_types=1);

use App\Model\Salle;

require_once dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/database.php';

$salles = [
    [
        'nom' => 'Amphithéâtre A',
        'batiment' => 'Bâtiment A',
        'capacite' => 250,
        'type' => 'amphitheatre',
        'active' => true,
    ],
    [
        'nom' => 'Salle B12',
        'batiment' => 'Bâtiment B',
        'capacite' => 40,
        'type' => 'cours',
        'active' => true,
    ],
    [
        'nom' => 'Laboratoire Chimie',
        'batiment' => 'Bâtiment C',
        'capacite' => 24,
        'type' => 'laboratoire',
        'active' => true,
    ],
    [
        'nom' => 'Salle Informatique 1',
        'batiment' => 'Bâtiment D',
        'capacite' => 30,
        'type' => 'informatique',
        'active' => true,
    ],
    [
        'nom' => 'Salle de réunion',
        'batiment' => 'Bâtiment principal',
        'capacite' => 12,
        'type' => 'reunion',
        'active' => true,
    ],
];


try {
    foreach ($salles as $salle) {
        Salle::firstOrCreate(
            ['nom' => $salle['nom']],
            $salle
        );
    }

    echo "Données initiales ajoutées avec succès." . PHP_EOL;

} catch (\Throwable $e) {
    echo "Erreur lors du seeding : " . $e->getMessage() . PHP_EOL;
    exit(1);
}