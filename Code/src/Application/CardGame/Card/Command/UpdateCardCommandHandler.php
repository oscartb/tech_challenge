<?php

namespace App\Application\CardGame\Card\Command;

use App\Application\CardGame\Card\CardCreator;
use App\Application\CardGame\Card\CardUpdater;
use App\Domain\Shared\Bus\Command\CommandHandler;

class UpdateCardCommandHandler implements CommandHandler
{

    private CardUpdater $cardUpdater;

    public function __construct(CardUpdater $cardUpdater)
    {
        $this->cardUpdater = $cardUpdater;
    }

    public function __invoke(UpdateCardCommand$command)
    {
        $uuid = $command->uuid();
        $name = $command->name();
        $damage = $command->damage();
        $HP = $command->HP();

        $this->cardUpdater->update($uuid, $name, $HP, $damage);
    }
}