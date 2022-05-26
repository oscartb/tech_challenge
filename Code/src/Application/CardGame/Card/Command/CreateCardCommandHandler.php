<?php

namespace App\Application\CardGame\Card\Command;

use App\Domain\Shared\Bus\Command\CommandHandler;

class CreateCardCommandHandler implements CommandHandler
{
    private CardCreator $cardCreator;

    public function __construct(CardCreator $cardCreator)
    {
        $this->cardCreator = $cardCreator;
    }

    public function __invoke(CreateCardCommand $command)
    {
        $name = $command->name();
        $damage = $command->damage();
        $HP = $command->HP();

        $this->cardCreator->create($name, $HP, $damage);
    }
}