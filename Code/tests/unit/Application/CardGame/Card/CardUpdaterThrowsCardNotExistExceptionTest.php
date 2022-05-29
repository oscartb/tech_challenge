<?php

use App\Application\CardGame\Card\CardUpdater;
use App\DataFixtures\CardMother;
use App\Domain\CardGame\Card\CardNotExist;
use App\Infrastructure\Persistance\Doctrine\CardRepository;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CardUpdaterThrowsCardNotExistExceptionTest extends KernelTestCase
{
    private ?CardMother $cardMother;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $this->cardMother = $container->get('App\DataFixtures\CardMother');
    }

    public function testCardUpdater()
    {
        $card = $this->cardMother->createRandomCard();

        $entityManagerMock = $this->createMock(AppEntityManager::class);
        $cardRepositoryMock = $this->createMock(CardRepository::class);

        $cardRepositoryMock->method("find")->willReturn(null);

        $this->expectException(CardNotExist::class);
        $sut = new CardUpdater($entityManagerMock, $cardRepositoryMock);
        $sut->update($card->getId(), $card->getName(), $card->getDamage(), $card->getHP());
    }
}