CREATE TABLE salles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    batiment VARCHAR(100) NOT NULL,
    capacite INT UNSIGNED NOT NULL,
    type VARCHAR(30) NOT NULL,
    active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT chk_salles_capacite
        CHECK (capacite >= 1),

    CONSTRAINT chk_salles_type
        CHECK (
            type IN (
                'cours',
                'informatique',
                'laboratoire',
                'amphitheatre',
                'reunion'
            )
        )
);

CREATE TABLE reservations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    salle_id INT UNSIGNED NOT NULL,
    responsable VARCHAR(120) NOT NULL,
    email VARCHAR(255) NOT NULL,
    motif VARCHAR(255) NOT NULL,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    statut VARCHAR(20) NOT NULL DEFAULT 'confirmée',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_reservations_salle
        FOREIGN KEY (salle_id)
        REFERENCES salles(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT chk_reservations_statut
        CHECK (
            statut IN ('confirmée', 'annulée')
        ),

    CONSTRAINT chk_reservations_dates
        CHECK (date_fin > date_debut)
);
