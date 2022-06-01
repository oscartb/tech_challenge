<?php

declare(strict_types=1);

namespace App\Domain\CardGame;

use App\Domain\CardGame\Entity\Deck;

interface DeckBuilder
{
    public function createDeck(): Deck;
}