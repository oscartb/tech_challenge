<?php

namespace App\Application\CardGame\Deck;

use App\Application\CardGame\Deck\Response\ListOfCardsInDeckResponse;
use App\Domain\CardGame\Deck\DeckNotExist;
use App\Infrastructure\Persistance\Doctrine\DeckRepository;

class DeckCardsFinder
{
    private DeckRepository $repository;

    public function __construct(DeckRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $uuid): ListOfCardsInDeckResponse
    {
        $deck = $this->repository->find($uuid);

        if (null === $deck) {
            throw new DeckNotExist();
        }

        return new ListOfCardsInDeckResponse($deck->getCards()->toArray());
    }
}