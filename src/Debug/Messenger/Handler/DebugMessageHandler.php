<?php
declare(strict_types=1);

namespace App\Debug\Messenger\Handler;

use App\Debug\Messenger\Message\DebugMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class DebugMessageHandler
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function __invoke(DebugMessage $message): void
    {
        $this->logger->debug($message->getMessage());
    }
}
