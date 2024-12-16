<?php

use App\Infrastructure\Symfony\HttpKernel\ApplicationKernel;

$_SERVER['APP_RUNTIME_OPTIONS'] = [
    'dotenv_path' => \sprintf('envs/%s.env', $_SERVER['APP_ENV'] ?? 'local'), // Ensure we use the right env vars
];

require_once \dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new ApplicationKernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
