<?php

namespace App\Domain\CardGame\Deck;

use App\Domain\CardGame\DeckBuilder;
use App\Domain\CardGame\Entity\Deck;

class RandomizeDeck
{

    private DeckBuilder $deckBuilder;

    public function __construct(DeckBuilder $deckBuilder)
    {
        $this->deckBuilder = $deckBuilder;
    }

    public function randomize(Deck $deck)
    {
        $newDeck = $this->deckBuilder->createDeck();
        $deck->removeAllCards();
        $deck->addCards($newDeck->getCards()->toArray());

        return $deck;
    }

}