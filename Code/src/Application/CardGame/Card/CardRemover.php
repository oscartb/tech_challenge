<?php

namespace App\Application\CardGame\Card;

use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Event\EventBus;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;

class CardRemover
{

    private EventBus $eventBus;
    private AppEntityManager $em;

    public function __construct(AppEntityManager $em, EventBus $eventBus)
    {
        $this->eventBus = $eventBus;
        $this->em = $em;
    }

    public function remove(string $uuid)
    {
        $cardRepository = $this->em->getRepository(Card::class);
        $card = $cardRepository->findOneBy(['id' => $uuid]);

        $card->remove();
        $this->em->remove($card);
        $this->em->flush();

        $this->eventBus->publish(...$card->pullDomainEvents());

        return $card;
    }
}