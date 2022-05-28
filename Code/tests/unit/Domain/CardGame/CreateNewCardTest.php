<?php

use App\Application\CardGame\Card\CardCreator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Domain\CardGame\Entity\Card;
use PHPUnit\Framework\Assert;

class CreateNewCardTest  extends KernelTestCase
{

    public function testCreateNewCardTest()
    {
        $entityManagerMock = $this->createMock(\Doctrine\ORM\EntityManager::class);
        $eventBusMock  = $this->createMock(App\Domain\Shared\Bus\Event\EventBus::class);

        $entityManagerMock->expects($this->exactly(1))
            ->method('persist')
            ->with($this->isInstanceOf(Card::class));

        $sut = new CardCreator($entityManagerMock, $eventBusMock);

        $eventBusMock->expects($this->once())
            ->method('publish')
            ->will($this->returnCallback(function($event) {
                Assert::assertInstanceOf(App\Domain\CardGame\DomainEvent\CardCreatedDomainEvent::class, $event );
            }));

        $sut->create('CardName', 10, 100);
    }
}