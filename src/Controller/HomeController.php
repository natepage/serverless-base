<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'home')]
readonly final class HomeController
{
    public function __construct(private string $envName, private string $someVar)
    {
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'env' => $this->envName,
            'someVar' => $this->someVar,
        ]);
    }
}
