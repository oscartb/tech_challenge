<?php

declare(strict_types=1);

namespace App\Application\CardGame\Card;

use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Event\EventBus;
use App\Infrastructure\Persistance\Doctrine\CardRepository;
use Doctrine\ORM\EntityManagerInterface;

class CardUpdater
{

    //TODO: Abstraction from doctrine
    private EntityManagerInterface $em;
    private CardRepository $cardRepository;

    public function __construct(EntityManagerInterface $em, CardRepository $cardRepository)
    {
        $this->em = $em;
        $this->cardRepository = $cardRepository;
    }

    public function update(string $uuid, string $name, int $damage, int $HP): ?Card
    {
        $card = $this->cardRepository->find($uuid);
        $card->update($name, $damage, $HP);

        $this->em->flush();

        return $card;
    }
}