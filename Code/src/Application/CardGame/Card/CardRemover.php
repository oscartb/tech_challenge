<?php

declare(strict_types=1);

namespace App\Application\CardGame\Card;

use App\Domain\CardGame\Card\CardNotExist;
use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Event\EventBus;
use App\Infrastructure\Persistance\Doctrine\CardRepository;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;

class CardRemover
{

    private EventBus $eventBus;
    private AppEntityManager $em;
    private CardRepository $cardRepository;

    public function __construct(AppEntityManager $em, EventBus $eventBus, CardRepository $cardRepository)
    {
        $this->eventBus = $eventBus;
        $this->em = $em;
        $this->cardRepository = $cardRepository;
    }

    public function remove(string $uuid)
    {
        $card = $this->cardRepository->findOneBy(['id' => $uuid]);
        if (null === $card) {
            throw new CardNotExist();
        }

        $card->remove();
        $this->em->remove($card);
        $this->em->flush();

        $this->eventBus->publish(...$card->pullDomainEvents());

        return $card;
    }
}