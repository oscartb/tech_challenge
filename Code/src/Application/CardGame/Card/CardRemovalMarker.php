<?php

namespace App\Application\CardGame\Card;

use App\Application\CardGame\Deck\Command\RandomizeDeckCommand;
use App\Domain\CardGame\DomainEvent\CardRemovedDomainEvent;
use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Command\CommandBus;
use App\Domain\Shared\Bus\Event\EventBus;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Shared\ValueObject\Uuid;

class CardRemovalMarker
{

    private EventBus $eventBus;
    //TODO: Abstraction from doctrine
    private EntityManagerInterface $em;
    private CommandBus $commandBus;

    public function __construct(EntityManagerInterface $em, EventBus $eventBus, CommandBus $commandBus)
    {
        $this->eventBus = $eventBus;
        $this->em = $em;
        $this->commandBus = $commandBus;
    }

    public function markForRemoval(string $uuid)
    {
        $cardRepository = $this->em->getRepository(Card::class);
        $card = $cardRepository->findOneBy(['id' => $uuid]);

        $card->markCardToBeRemoved();
        $this->em->flush();

        $decksContainedMarkedCard = $card->getDecks();
        foreach($decksContainedMarkedCard as $deck)
        {
            $this->commandBus->dispatch(new RandomizeDeckCommand($deck->getId()));
        }

        return $card;
    }
}