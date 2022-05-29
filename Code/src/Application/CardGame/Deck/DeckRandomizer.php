<?php

namespace App\Application\CardGame\Deck;

use App\Domain\CardGame\Deck\RandomizeDeck;
use App\Domain\CardGame\Entity\Deck;
use Doctrine\ORM\EntityManagerInterface;

class DeckRandomizer
{

    //TODO: Abstraction from doctrine
    private EntityManagerInterface $em;
    private RandomizeDeck $randomizeDeck;

    public function __construct(EntityManagerInterface $em, RandomizeDeck $randomizeDeck)
    {
        $this->em = $em;
        $this->randomizeDeck = $randomizeDeck;
    }

    public function randomize($uuid): Deck
    {
        $deckRepository = $this->em->getRepository(Deck::class);
        $deck = $deckRepository->find($uuid);
        $deck = $this->randomizeDeck->randomize($deck);

        $this->em->flush();

        return $deck;
    }
}