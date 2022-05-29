<?php

declare(strict_types=1);

namespace App\Application\CardGame\Card;

use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Event\EventBus;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;

class CardCreator
{

    private EventBus $eventBus;
    private AppEntityManager $em;

    public function __construct(AppEntityManager $em, EventBus $eventBus)
    {
        $this->eventBus = $eventBus;
        $this->em = $em;
    }

    public function create(string $name, int $damage, int $HP): Card
    {
        $card = Card::create($name, $damage, $HP);

        $this->em->save($card);

       $this->eventBus->publish(...$card->pullDomainEvents());

        return $card;
    }
}