<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->bind('$envName', param('kernel.environment'))
        ->bind('$someVar', env('SOME_VAR'));

    $services
        ->load('App\\', __DIR__ . '/../src/')
        ->exclude([
            __DIR__ . '/../src/DependencyInjection/',
            __DIR__ . '/../src/Entity/',
            __DIR__ . '/../src/Infrastructure/Symfony/HttpKernel/ApplicationKernel.php',
        ]);

    $services
        ->load('App\\Controller\\', __DIR__ . '/../src/Controller/')
        ->tag('controller.service_arguments');
};
