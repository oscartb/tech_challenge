<?php

declare(strict_types=1);

namespace App\Domain\CardGame\Deck;

use RuntimeException;

class DeckNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Deck does not exist', 404);
    }
}