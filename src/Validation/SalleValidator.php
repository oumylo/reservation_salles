<?php

declare(strict_types=1);

namespace App\Validation;

use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SalleValidator implements ValidatorInterface
{
    public function validate(array $data): ValidationResult
    {
        $errors = [];

        $this->validateField(
            $data,
            'nom',
            Validator::stringType()->notEmpty()->length(2, 100),
            'Le nom est obligatoire et doit contenir entre 2 et 100 caractères.',
            $errors
        );

        $this->validateField(
            $data,
            'batiment',
            Validator::stringType()->notEmpty()->length(2, 100),
            'Le bâtiment est obligatoire et doit contenir entre 2 et 100 caractères.',
            $errors
        );

        $this->validateField(
            $data,
            'capacite',
            Validator::intType()->between(1, 1000),
            'La capacité doit être un entier compris entre 1 et 1000.',
            $errors
        );

        $this->validateField(
            $data,
            'type',
            Validator::in([
                'cours',
                'informatique',
                'laboratoire',
                'amphitheatre',
                'reunion',
            ]),
            'Le type de salle est invalide.',
            $errors
        );

        $this->validateField(
            $data,
            'active',
            Validator::boolType(),
            'Le champ active doit être un booléen.',
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