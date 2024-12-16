<?php
declare(strict_types=1);

namespace App\Debug\Messenger\Message;

final class DebugMessage
{
    public function __construct(private readonly string $message)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
