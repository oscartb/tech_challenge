<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Domain\CardGame\Entity\Card;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\Dictionary;

class CardFixtures extends Fixture
{
    private CardMother $cardMother;

    public function __construct(CardMother $cardMother)
    {
        $this->cardMother = $cardMother;
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0; $i <= 49; $i++)
        {
            $card = $this->cardMother->createRandomCard();
            $manager->persist($card);
        }

        $manager->flush();
    }

}
