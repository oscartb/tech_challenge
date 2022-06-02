<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Domain\CardGame\Entity\Card;

class CardMother
{
    private Dictionary $dictionary;

    public function __construct(Dictionary $dictionary)
    {

        $this->dictionary = $dictionary;
    }

    public function createRandomCard(): Card
    {
        $name = $this->dictionary->getRandomName();
        $HP = rand(50, 100);
        $damage = rand(1, 10);
        return new Card($name,$damage,$HP);
    }
}