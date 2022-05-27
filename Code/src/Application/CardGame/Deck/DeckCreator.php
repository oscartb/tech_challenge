<?php

namespace App\Application\CardGame\Deck;

use App\Domain\CardGame\DeckBuilder;
use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Event\EventBus;
use Doctrine\ORM\EntityManagerInterface;

class DeckCreator
{

    private EventBus $eventBus;
    //TODO: Abstraction from doctrine
    private EntityManagerInterface $em;
    private DeckBuilder $deckBuilder;

    public function __construct(EntityManagerInterface $em, EventBus $eventBus, DeckBuilder $deckBuilder)
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