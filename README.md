# Gestion des réservations de salles universitaires

Application web PHP orientée objet permettant de consulter les salles
universitaires et de gérer leurs réservations.

## Technologies

- PHP 8.3
- MySQL
- Composer
- Eloquent
- FastRoute
- PHP-DI
- Respect/Validation
- PHP dotenv

## Version

v0.0.0

## 1. Quel est le rôle de Composer ?

Composer est le gestionnaire de dépendances de PHP. Il permet d'installer et de gérer les bibliothèques externes du projet, leurs versions et leurs dépendances

## 2. Quelle différence existe entre require et require-dev ?

## require

Ce sont les dépendances nécessaires au fonctionnement de l'application.Par exemple, dans notre projet :

nikic/fast-route
respect/validation
php-di/php-di
vlucas/phpdotenv
illuminate/database

## require-dev

Ce sont les dépendances utilisées uniquement pendant le développement, comme PHPUnit pour les tests.

composer require --dev phpunit/phpunit

# 3. Pourquoi faut-il versionner composer.lock ?

On versionne composer.lock afin que tous les développeurs et les environnements utilisent exactement les mêmes versions de dépendances. Cela garantit des installations reproductibles et évite les différences de comportement entre les machines.

## 4. Pourquoi ne versionne-t-on pas vendor/ ?

On ne versionne pas vendor/ car ce dossier contient des dépendances générées automatiquement par Composer. Il peut être volumineux et n'est pas nécessaire dans Git puisque composer install permet de le recréer à partir de composer.json et composer.lock





