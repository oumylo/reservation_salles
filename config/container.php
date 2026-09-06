<?php

declare(strict_types=1);

use App\Repository\ReservationRepository;
use App\Repository\ReservationRepositoryInterface;
use App\Repository\SalleRepository;
use App\Repository\SalleRepositoryInterface;
use App\Service\CreerReservationService;
use App\Service\AnnulerReservationService;
use App\Service\Strategy\ConflitReservationRegle;
use App\Service\Strategy\DateFutureRegle;
use App\Service\Strategy\DatesReservationRegle;
use App\Service\Strategy\DureeReservationRegle;
use App\Service\Strategy\SalleActiveRegle;
use App\Service\Strategy\SalleExisteRegle;
use DI\ContainerBuilder;
use function DI\autowire;
use function DI\get;

$builder = new ContainerBuilder();

$builder->addDefinitions([

  
    SalleRepositoryInterface::class => autowire(
        SalleRepository::class
    ),

    ReservationRepositoryInterface::class => autowire(
        ReservationRepository::class
    ),

   
    CreerReservationService::class => autowire()
        ->constructorParameter(
            'regles',
            [
                get(SalleExisteRegle::class),
                get(SalleActiveRegle::class),
                get(DatesReservationRegle::class),
                get(DureeReservationRegle::class),
                get(DateFutureRegle::class),
                get(ConflitReservationRegle::class),
            ]
        ),
        AnnulerReservationService::class => autowire(),
]);

return $builder->build();