<?php

use App\Domain\CardGame\SuperHeroesDeckBuilder;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SuperHeroesDeckBuilderTest  extends KernelTestCase
{

    private SuperHeroesDeckBuilder $superHeroesDeckBuilder;

  protected function setUp(): void
  {
      parent::setUp();
      self::bootKernel();
      $container = self::$kernel->getContainer();
      $this->superHeroesDeckBuilder = $container->get('App\Domain\CardGame\SuperHeroesDeckBuilder');
  }

  public function testDeckBuilding()
  {
      $newDeck = $this->superHeroesDeckBuilder->createDeck();
      foreach($newDeck->getCards() as $card){
          var_dump($card->getName());
          var_dump($card->getDamage());
          var_dump($card->getId());
      }
       exit();
  }
}