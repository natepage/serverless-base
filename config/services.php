<?php

declare(strict_types=1);

use App\Infrastructure\Bref\DebugSqsHandler;
use Bref\Symfony\Messenger\Service\Sqs\SqsConsumer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->bind('$envName', param('kernel.environment'));

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

    // Register SQS Consumer for Worker
    $services
        ->set(SqsConsumer::class)
        ->arg('$transportName', 'async');

    $services
        ->set(DebugSqsHandler::class)
        ->public();
};
