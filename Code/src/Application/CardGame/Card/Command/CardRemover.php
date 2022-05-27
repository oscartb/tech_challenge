<?php

namespace App\Application\CardGame\Card\Command;

use App\Domain\CardGame\DomainEvent\CardRemovedDomainEvent;
use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Event\EventBus;
use Doctrine\ORM\EntityManagerInterface;
use App\Domain\Shared\ValueObject\Uuid;

class CardRemover
{

    private EventBus $eventBus;
    //TODO: Abstraction from doctrine
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, EventBus $eventBus)
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