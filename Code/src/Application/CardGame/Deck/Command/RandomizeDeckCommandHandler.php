<?php

declare(strict_types=1);

namespace App\Application\CardGame\Deck\Command;

use App\Application\CardGame\Deck\DeckRandomizer;
use App\Domain\Shared\Bus\Command\CommandHandler;

class RandomizeDeckCommandHandler  implements CommandHandler
{


    private DeckRandomizer $deckRandomizer;

    public function __construct(DeckRandomizer $deckRandomizer)
    {

        $this->deckRandomizer = $deckRandomizer;
    }

    public function __invoke(RandomizeDeckCommand $command)
    {
        $uuid = $command->uuid();
        $this->deckRandomizer->randomize($uuid);
    }
}