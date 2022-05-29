<?php

use App\Application\CardGame\Card\CardUpdater;
use App\DataFixtures\CardMother;
use App\Infrastructure\Persistance\Doctrine\CardRepository;
use App\Infrastructure\Symfony\Doctrine\AppEntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CardUpdaterTest extends KernelTestCase
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

        $oldName = $card->getName();
        $oldDamage = $card->getDamage();
        $oldHP = $card->getHP();

        $entityManagerMock = $this->createMock(AppEntityManager::class);
        $cardRepositoryMock = $this->createMock(CardRepository::class);

        $cardRepositoryMock->method("find")->willReturn($card);

        $sut = new CardUpdater($entityManagerMock, $cardRepositoryMock);
        $newCard  = $this->cardMother->createRandomCard();
        $updatedCard = $sut->update($card->getId(), $newCard->getName(), $newCard->getDamage(), $newCard->getHP());
        $this->assertNotEquals([$oldName, $oldDamage, $oldHP], [$updatedCard->getName(), $updatedCard->getDamage(), $updatedCard->getHP()]);

    }
}