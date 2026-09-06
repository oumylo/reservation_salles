<?php

declare(strict_types=1);

namespace App\Validation;

use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ReservationValidator implements ValidatorInterface
{
    public function validate(array $data): ValidationResult
    {
        $errors = [];

       
        $this->validateField(
            $data,
            'salle_id',
            Validator::intType()->positive(),
            'L\'identifiant de la salle doit être un entier positif.',
            $errors
        );

        
        $this->validateField(
            $data,
            'responsable',
            Validator::stringType()->notEmpty()->length(2, 120),
            'Le responsable doit contenir entre 2 et 120 caractères.',
            $errors
        );

       
        $this->validateField(
            $data,
            'email',
            Validator::email(),
            'L\'adresse email est invalide.',
            $errors
        );

        $this->validateField(
            $data,
            'motif',
            Validator::stringType()->notEmpty()->length(5, 255),
            'Le motif doit contenir entre 5 et 255 caractères.',
            $errors
        );

        
        $this->validateField(
            $data,
            'date_debut',
            Validator::dateTime('Y-m-d H:i:s'),
            'La date de début est invalide.',
            $errors
        );

       
        $this->validateField(
            $data,
            'date_fin',
            Validator::dateTime('Y-m-d H:i:s'),
            'La date de fin est invalide.',
            $errors
        );

        return new ValidationResult(
            empty($errors),
            $errors,
            $data
        );
    }

    private function validateField(
        array $data,
        string $field,
        Validator $validator,
        string $message,
        array &$errors
    ): void {
        if (!array_key_exists($field, $data)) {
            $errors[$field][] = 'Le champ est obligatoire.';
            return;
        }

        try {
            $validator->check($data[$field]);
        } catch (ValidationException) {
            $errors[$field][] = $message;
        }
    }
}