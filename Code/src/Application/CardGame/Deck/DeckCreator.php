<?php

declare(strict_types=1);

namespace App\Application\CardGame\Deck;

use App\Domain\CardGame\DeckBuilder;
use App\Domain\Shared\Bus\Event\EventBus;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;

class DeckCreator
{

    private EventBus $eventBus;
    private AppEntityManager $em;
    private DeckBuilder $deckBuilder;

    public function __construct(AppEntityManager $em, EventBus $eventBus, DeckBuilder $deckBuilder)
    {
        $this->eventBus = $eventBus;
        $this->em = $em;
        $this->deckBuilder = $deckBuilder;
    }

    public function create()
    {
       $deck = $this->deckBuilder->createDeck();

        $this->em->persist($deck);
        $this->em->flush();

        $this->eventBus->publish(...$deck->pullDomainEvents());

        return $deck;
    }
}