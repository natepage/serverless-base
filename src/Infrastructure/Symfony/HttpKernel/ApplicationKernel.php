<?php

namespace App\Infrastructure\Symfony\HttpKernel;

use Bref\SymfonyBridge\BrefKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;

class ApplicationKernel extends BrefKernel
{
    use MicroKernelTrait;

    protected function getWritableCacheDirectories(): array
    {
        // Optimize cache copy by default
        return [];
    }
}
