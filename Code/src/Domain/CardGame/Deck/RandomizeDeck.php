<?php

declare(strict_types=1);

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

    public function randomize(Deck $deck): Deck
    {
        $newDeck = $this->deckBuilder->createDeck();
        $deck->removeAllCards();
        $deck->addCards($newDeck->getCards()->toArray());

        return $deck;
    }

}