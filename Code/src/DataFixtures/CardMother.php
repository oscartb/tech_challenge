<?php

namespace App\DataFixtures;

use App\Domain\CardGame\Entity\Card;

class CardMother
{
    public function createRandomCard(): Card
    {
        $name = Dictionary::getRandomName();
        $HP = rand(50, 100);
        $damage = rand(1, 10);
        return new Card($name,$damage,$HP);
    }
}