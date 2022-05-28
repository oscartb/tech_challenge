<?php

declare(strict_types=1);

namespace  App\Application\CardGame\Deck\Query;

use App\Application\CardGame\Deck\DeckCardsFinder;
use App\Application\CardGame\Deck\Response\ListOfCardsInDeckResponse;
use App\Domain\Shared\Bus\Query\QueryHandler;

class GetListOfCardsInDeckQueryHandler implements QueryHandler
{
    private DeckCardsFinder $finder;

    public function __construct(DeckCardsFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(GetListOfCardsInDeckQuery $query): ListOfCardsInDeckResponse
    {
        return $this->finder->__invoke($query->uuid());
    }
}