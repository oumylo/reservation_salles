<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

$basePath = dirname(__DIR__);

$dotenv = Dotenv::createImmutable($basePath);

$dotenv->load();

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => $_ENV['DB_DRIVER'],
    'host' => $_ENV['DB_HOST'],
    'port' => (int) $_ENV['DB_PORT'],
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
return $capsule;