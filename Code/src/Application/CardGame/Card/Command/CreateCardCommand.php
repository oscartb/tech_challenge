<?php

declare(strict_types=1);

namespace App\Application\CardGame\Card\Command;

use App\Domain\Shared\Bus\Command\Command;

final class CreateCardCommand implements Command
{
    private string $name;
    private int $HP;
    private int $damage;

    public function __construct(string $name, int $HP, int $damage)
    {
        $this->name     = $name;
        $this->damage = $damage;
        $this->HP = $HP;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function HP(): int
    {
        return $this->HP;
    }

    public function damage(): int
    {
        return $this->damage;
    }
}
