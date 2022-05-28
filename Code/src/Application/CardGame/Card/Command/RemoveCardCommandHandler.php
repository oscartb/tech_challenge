<?php

namespace App\Application\CardGame\Card\Command;

use App\Application\CardGame\Card\CardRemover;
use App\Domain\Shared\Bus\Command\CommandHandler;

class RemoveCardCommandHandler implements CommandHandler
{
    private CardRemover $cardRemover;

    public function __construct(CardRemover $cardRemover)
    {
        $this->cardRemover = $cardRemover;
    }

    public function __invoke(RemoveCardCommand $command)
    {
        $uuid = $command->uuid();
        $this->cardRemover->remove($uuid);
    }
}