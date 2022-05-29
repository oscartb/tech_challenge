<?php

namespace App\DataFixtures;

use App\Domain\CardGame\Entity\Deck;

class DeckMother
{
    private CardMother $cardMother;

    public function __construct(CardMother $cardMother)
    {
        $this->cardMother = $cardMother;
    }


    public function createDeck(): Deck
    {
        $deck = new Deck();
        for($i=0; $i < 20; $i++)
        {
            $deck->addCard($this->cardMother->createRandomCard());
        }
        return $deck;
    }
}