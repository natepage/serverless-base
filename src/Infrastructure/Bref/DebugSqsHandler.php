<?php
declare(strict_types=1);

namespace App\Infrastructure\Bref;

use Bref\Context\Context;
use Bref\Event\Handler;
use Bref\Symfony\Messenger\Service\Sqs\SqsConsumer;

final class DebugSqsHandler implements Handler
{
    public function __construct(
        private readonly SqsConsumer $decorated,
    ) {
    }

    public function handle(mixed $event, Context $context)
    {
        \print_r($event);

        return $this->decorated->handle($event, $context);
    }
}
