<?php

declare(strict_types=1);

namespace App\Domain\CardGame\Card\RandomNaming;

use App\DataFixtures\AdjectiveLoader;
use App\DataFixtures\NameLoader;

class NameFirstNamingStrategy implements NamingStrategy
{
    public static function getRandomName(): string
    {
        $nameDictionary = NameLoader::loadNameDictionary();
        $adjectiveDictionary = AdjectiveLoader::loadAdjectiveDictionary();
        return $nameDictionary[rand(0, count($nameDictionary) - 1)] . " the " . $adjectiveDictionary[rand(0, count($adjectiveDictionary) - 1)];
    }
}