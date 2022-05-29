<?php


use App\Domain\CardGame\Deck\RandomizeDeck;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\DataFixtures\DeckMother;

class RandomizeDeckTest  extends KernelTestCase
{
    private ?DeckMother $deckMother;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $this->deckMother = $container->get('App\DataFixtures\DeckMother');
    }

    public function testRandomizeDeck()
    {
        $deckBuilderMock = $this->createMock(\App\Domain\CardGame\DeckBuilder::class);
        $deckMock = $this->createMock(\App\Domain\CardGame\Entity\Deck::class);

        $deck = $this->deckMother->createDeck();
        $deckMock
            ->method("getCards")
            ->willReturn($deck->getCards());

        $deckMock->expects($this->once())
            ->method("removeAllCards");

        $deckMock->expects($this->once())
            ->method("addCards");

        $deckBuilderMock->expects($this->once())
            ->method('createDeck')
            ->willReturn($deckMock);

        $sut = new RandomizeDeck($deckBuilderMock);
        $deck = $sut->randomize($deckMock);

        $this->assertCount(20, $deck->getCards());
    }
}