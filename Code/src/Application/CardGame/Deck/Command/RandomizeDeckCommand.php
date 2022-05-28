<?php

declare(strict_types=1);

namespace App\Application\CardGame\Deck\Command;

use App\Domain\Shared\Bus\Command\Command;

final class RandomizeDeckCommand implements Command
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
