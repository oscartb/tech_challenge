<?php

declare(strict_types=1);

namespace App\Application\CardGame\Card\Command;

use App\Domain\Shared\Bus\Command\Command;

final class MarkCardForRemovalCommand implements Command
{
    private string $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }
}
