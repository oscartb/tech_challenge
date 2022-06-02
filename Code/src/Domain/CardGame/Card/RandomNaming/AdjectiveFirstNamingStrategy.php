<?php

declare(strict_types=1);

namespace App\Domain\CardGame\Card\RandomNaming;

use App\DataFixtures\AdjectiveLoader;
use App\DataFixtures\NameLoader;

class AdjectiveFirstNamingStrategy implements NamingStrategy
{
    public static function getRandomName(): string
    {
        $nameDictionary = NameLoader::loadNameDictionary();
        $adjectiveDictionary = AdjectiveLoader::loadAdjectiveDictionary();
        return  $adjectiveDictionary[rand(0, count($adjectiveDictionary) - 1)]  . " " . $nameDictionary[rand(0, count($nameDictionary) - 1)] ;
    }
}