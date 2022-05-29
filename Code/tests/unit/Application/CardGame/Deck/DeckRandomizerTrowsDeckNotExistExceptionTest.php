<?php

use App\Application\CardGame\Deck\DeckRandomizer;
use App\DataFixtures\DeckMother;
use App\Domain\CardGame\Deck\DeckNotExist;
use App\Domain\CardGame\Deck\RandomizeDeck;
use App\Infrastructure\Persistance\Doctrine\DeckRepository;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DeckRandomizerTrowsDeckNotExistExceptionTest extends KernelTestCase
{

    private ?DeckMother $deckMother;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $this->deckMother = $container->get('App\DataFixtures\DeckMother');
    }

    public function testDeckRandomizerTrowsDeckNotExistException()
    {
        $entityManagerMock = $this->createMock(AppEntityManager::class);
        $deckRandomizerMock = $this->createMock(RandomizeDeck::class);
        $deckRepository = $this->createMock(DeckRepository::class);

        $deckRepository
            ->method('find')
            ->willReturn(null);

        $this->expectException(DeckNotExist::class);

        $sut = new DeckRandomizer($entityManagerMock, $deckRepository, $deckRandomizerMock);
        $deck = $this->deckMother->createDeck();
        $deck = $sut->randomize($deck);
    }
}