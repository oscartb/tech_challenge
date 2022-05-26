<?php

namespace App\Domain\CardGame;

use Doctrine\ORM\EntityManagerInterface;
use App\Domain\CardGame\Entity\Deck;
use App\Domain\CardGame\Entity\Card;

class SuperHeroesDeckBuilder implements DeckBuilder
{

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createDeck(): Deck
    {
        $cardRepository = $this->em->getRepository(Card::class);
        $randomCards = $cardRepository->getRandomCards(20);
        $deck = new Deck();
        $deck->addCards($randomCards);
        return $deck;
    }
}