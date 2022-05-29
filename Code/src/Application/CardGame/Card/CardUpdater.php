<?php

declare(strict_types=1);

namespace App\Application\CardGame\Card;

use App\Domain\CardGame\Card\CardNotExist;
use App\Domain\CardGame\Entity\Card;
use App\Infrastructure\Persistance\Doctrine\CardRepository;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;

class CardUpdater
{

    private AppEntityManager $em;
    private CardRepository $cardRepository;

    public function __construct(AppEntityManager $em, CardRepository $cardRepository)
    {
        $this->em = $em;
        $this->cardRepository = $cardRepository;
    }

    public function update(string $uuid, string $name, int $damage, int $HP): ?Card
    {
        $card = $this->cardRepository->find($uuid);
        if (null === $card) {
            throw new CardNotExist();
        }

        $card->update($name, $damage, $HP);
        $this->em->flush();

        return $card;
    }
}