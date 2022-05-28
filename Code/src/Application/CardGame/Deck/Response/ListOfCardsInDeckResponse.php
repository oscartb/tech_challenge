<?php

declare(strict_types=1);

namespace  App\Application\CardGame\Deck\Response;

use App\Domain\Shared\Bus\Query\Response;


class ListOfCardsInDeckResponse implements Response
{
    private array $listOfCards;

    public function  __construct(array $listOfCards)
    {
        $this->listOfCards = $listOfCards;
    }

    public function listOfCards(): array
    {
        return $this->listOfCards;
    }
}