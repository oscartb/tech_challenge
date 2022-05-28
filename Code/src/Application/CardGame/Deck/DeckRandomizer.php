<?php

namespace App\Application\CardGame\Deck;

use App\Domain\CardGame\DeckBuilder;
use App\Domain\CardGame\Entity\Card;
use App\Domain\CardGame\Entity\Deck;
use App\Domain\Shared\Bus\Event\EventBus;
use Doctrine\ORM\EntityManagerInterface;

class DeckRandomizer
{

    //TODO: Abstraction from doctrine
    private EntityManagerInterface $em;
    private DeckBuilder $deckBuilder;

    public function __construct(EntityManagerInterface $em, DeckBuilder $deckBuilder)
    {
        $this->em = $em;
        $this->deckBuilder = $deckBuilder;
    }

    public function randomize($uuid): Deck
    {
        $newDeck = $this->deckBuilder->createDeck();
        $deckRepository = $this->em->getRepository(Deck::class);
        /**@var Deck $deck*/
        $deck = $deckRepository->find($uuid);
        $deck->removeAllCards();
        $deck->addCards($newDeck->getCards()->toArray());

        $this->em->flush();

        return $deck;
    }
}