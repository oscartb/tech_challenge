<?php

declare(strict_types=1);

namespace App\Application\CardGame\Card;

use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Event\EventBus;
use Doctrine\ORM\EntityManagerInterface;

class CardCreator
{

    private EventBus $eventBus;
    //TODO: Abstraction from doctrine
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, EventBus $eventBus)
    {
        $this->eventBus = $eventBus;
        $this->em = $em;
    }

    public function create(string $name, int $damage, int $HP)
    {
        $card = Card::create($name, $damage, $HP);

        $this->em->persist($card);
        $this->em->flush();

       $this->eventBus->publish(...$card->pullDomainEvents());

        return $card;
    }
}