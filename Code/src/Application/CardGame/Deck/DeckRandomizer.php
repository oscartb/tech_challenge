<?php

namespace App\Application\CardGame\Deck;

use App\Domain\CardGame\Deck\DeckNotExist;
use App\Domain\CardGame\Deck\RandomizeDeck;
use App\Domain\CardGame\Entity\Deck;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;

class DeckRandomizer
{

    private AppEntityManager $em;
    private RandomizeDeck $randomizeDeck;

    public function __construct(AppEntityManager $em, RandomizeDeck $randomizeDeck)
    {
        $this->em = $em;
        $this->randomizeDeck = $randomizeDeck;
    }

    public function randomize($uuid): Deck
    {
        $deckRepository = $this->em->getRepository(Deck::class);
        $deck = $deckRepository->find($uuid);
        if (null === $deck) {
            throw new DeckNotExist();
        }

        $deck = $this->randomizeDeck->randomize($deck);

        $this->em->flush();

        return $deck;
    }
}