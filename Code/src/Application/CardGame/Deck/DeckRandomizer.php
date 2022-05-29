<?php

namespace App\Application\CardGame\Deck;

use App\Domain\CardGame\Deck\DeckNotExist;
use App\Domain\CardGame\Deck\RandomizeDeck;
use App\Domain\CardGame\Entity\Deck;
use App\Infrastructure\Persistance\Doctrine\DeckRepository;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;

class DeckRandomizer
{

    private AppEntityManager $em;
    private RandomizeDeck $randomizeDeck;
    private DeckRepository $deckRepository;

    public function __construct(AppEntityManager $em,DeckRepository $deckRepository, RandomizeDeck $randomizeDeck)
    {
        $this->em = $em;
        $this->randomizeDeck = $randomizeDeck;
        $this->deckRepository = $deckRepository;
    }

    public function randomize($uuid): Deck
    {
        $deck = $this->deckRepository->find($uuid);
        if (null === $deck) {
            throw new DeckNotExist();
        }

        $deck = $this->randomizeDeck->randomize($deck);

        $this->em->flush();

        return $deck;
    }
}