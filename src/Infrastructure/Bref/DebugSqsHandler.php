<?php
declare(strict_types=1);

namespace App\Infrastructure\Bref;

use Bref\Context\Context;
use Bref\Event\Handler;
use Bref\Symfony\Messenger\Service\Sqs\SqsConsumer;
use Psr\Log\LoggerInterface;

final class DebugSqsHandler implements Handler
{
    public function __construct(
        private readonly SqsConsumer $decorated,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function handle(mixed $event, Context $context)
    {
        $this->logger->debug('SQS Event', ['event' => $event]);

        return $this->decorated->handle($event, $context);
    }
}
