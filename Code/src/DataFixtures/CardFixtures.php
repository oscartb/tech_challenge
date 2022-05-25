<?php

namespace App\DataFixtures;

use App\Domain\CardGame\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\Dictionary;

class CardFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i <= 49; $i++)
        {
            $card = $this->createRandomCard();
            $manager->persist($card);
        }

        $manager->flush();
    }

    public function createRandomCard()
    {
       $name = Dictionary::getRandomName();
       $HP = rand(50, 100);
       $damage = rand(1, 10);
       return new Card($name,$damage,$HP);
    }
}
