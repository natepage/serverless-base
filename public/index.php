<?php

use App\Infrastructure\Symfony\HttpKernel\ApplicationKernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new ApplicationKernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
