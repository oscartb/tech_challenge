<?php

declare(strict_types=1);

namespace App\Application\CardGame\Deck\Command;

use App\Application\CardGame\Deck\DeckCreator;
use App\Domain\Shared\Bus\Command\CommandHandler;

class CreateDeckCommandHandler implements CommandHandler
{
    private DeckCreator $deckCreator;

    public function __construct(DeckCreator $deckCreator)
    {
        $this->deckCreator = $deckCreator;
    }

    public function __invoke(CreateDeckCommand $command)
    {
        $this->deckCreator->create();
    }
}