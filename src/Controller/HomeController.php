<?php
declare(strict_types=1);

namespace App\Controller;

use App\Debug\Messenger\Message\DebugMessage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'home')]
readonly final class HomeController
{
    public function __construct(
        private string $envName,
        private string $someVar,
        private MessageBusInterface $bus
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $this->bus->dispatch(new DebugMessage('debug message'));

        return new JsonResponse([
            'env' => $this->envName,
            'someVar' => $this->someVar,
        ]);
    }
}
