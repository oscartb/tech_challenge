<?php

declare(strict_types=1);

namespace  App\Application\CardGame\Deck\Query;

use App\Domain\Shared\Bus\Query\Query;

class GetListOfCardsInDeckQuery implements Query
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