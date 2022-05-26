<?php

namespace App\Domain\CardGame;

use App\Domain\CardGame\Entity\Deck;

interface DeckBuilder
{
    public function createDeck(): Deck;
}