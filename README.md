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

## Etape 2 Questions

## 1.​ Quel rôle joue Capsule\Manager ?

Capsule\Manager permet de configurer la connexion à la base de données et de démarrer Eloquent dans une application PHP qui n'utilise pas Laravel. Il reçoit les paramètres de connexion puis initialise Eloquent avec ces paramètres.
# Capsule configure → Eloquent fonctionne → MySQL stocke les données.


## 2.​ Pourquoi Eloquent peut-il fonctionner sans Laravel ?

Parce qu’Eloquent est une bibliothèque PHP indépendante du framework Laravel.


## 3.​ Où doit se trouver le démarrage de l’ORM ?
Le démarrage de l’ORM doit être centralisé dans le fichier de configuration de la base de données, ici config/database.php. 


## 4.​ Quelle différence existe entre ORM et SQL écrit à la main ?
# Avec du SQL 

On écrit directement la requête SQL. Par exemple

$stmt = $pdo->query('SELECT * FROM salles');

$salles = $stmt->fetchAll();

# Avec un ORM comme Eloquent
Avec Eloquent, on manipule principalement des objets et des classes PHP . Par exemple :
$salles = Salle::all();
Eloquent va générer une requête SQL équivalente, approximativement :

SELECT * FROM salles;

## Etape 2 Questions

# 1 Une migration sert à créer ou modifier la structure de la base de données, tandis qu'un seeder sert à insérer des données initiales ou de référence dans les tables.

## 2.​ Pourquoi les données initiales doivent-elles être reproductibles ?

Les données initiales doivent être reproductibles afin de pouvoir réinitialiser ou préparer l'environnement de développement plusieurs fois sans créer de données incohérentes ou de doublons.

## 3.​ Comment empêcher les doublons ?

Eloquent fournit firstOrCreate(), qui recherche d'abord une salle par son nom et ne la crée que si elle n'existe pas.


# seed.php sera un script exécutable qui charge la configuration Eloquent puis crée les données initiales de notre application.


