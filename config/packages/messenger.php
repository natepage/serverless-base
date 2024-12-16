<?php

declare(strict_types=1);

use App\Debug\Messenger\Message\DebugMessage;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('framework', [
        'messenger' => [
            'transports' => [
                'async' => [
                    'dsn' => '%env(MESSENGER_TRANSPORT_DSN)%',
                    'options' => [
                        'auto_setup' => false,
                    ],
                ],
            ],
            'routing' => [
                DebugMessage::class => 'async',
            ],
        ],
    ]);
};
