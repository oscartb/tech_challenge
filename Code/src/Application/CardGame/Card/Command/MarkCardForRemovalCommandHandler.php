<?php

namespace App\Application\CardGame\Card\Command;

use App\Application\CardGame\Card\CardRemovalMarker;
use App\Application\CardGame\Card\CardRemover;
use App\Domain\Shared\Bus\Command\CommandHandler;

class MarkCardForRemovalCommandHandler implements CommandHandler
{
    private CardRemovalMarker $cardRemovalMarker;

    public function __construct(CardRemovalMarker $cardRemovalMarker)
    {
        $this->cardRemovalMarker = $cardRemovalMarker;
    }

    public function __invoke(MarkCardForRemovalCommand $command)
    {
        $uuid = $command->uuid();
        $this->cardRemovalMarker->markForRemoval($uuid);
    }
}