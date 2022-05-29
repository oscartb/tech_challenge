<?php

namespace App\Application\CardGame\Card;

use App\Application\CardGame\Deck\Command\RandomizeDeckCommand;
use App\Domain\CardGame\Entity\Card;
use App\Domain\Shared\Bus\Command\CommandBus;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;
use Doctrine\ORM\EntityManagerInterface;

class CardRemovalMarker
{

    private AppEntityManager $em;
    private CommandBus $commandBus;

    public function __construct(AppEntityManager $em, CommandBus $commandBus)
    {
        $this->em = $em;
        $this->commandBus = $commandBus;
    }

    public function markForRemoval(string $uuid)
    {
        $cardRepository = $this->em->getRepository(Card::class);
        $card = $cardRepository->findOneBy(['id' => $uuid]);

        $card->markCardToBeRemoved();
        $this->em->flush();

        $decksContainedMarkedCard = $card->getDecks();
        foreach($decksContainedMarkedCard as $deck)
        {
            $this->commandBus->dispatch(new RandomizeDeckCommand($deck->getId()));
        }

        return $card;
    }
}