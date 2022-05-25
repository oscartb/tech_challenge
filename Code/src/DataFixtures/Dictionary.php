<?php

namespace App\DataFixtures;

class Dictionary
{
    public static function getRandomName()
    {
        $nameDictionary = self::loadNameDictionary();
        $adjectiveDictrionary = self::loadAdjectiveDictionary();
        return $nameDictionary[rand(0, count($nameDictionary) - 1)] . " the " . $adjectiveDictrionary[rand(0, count($adjectiveDictrionary) - 1)];
    }

    private static function loadNameDictionary()
    {
        $csv = array_map('str_getcsv', file(__DIR__ . '/names.csv'));
        return reset($csv);
    }

    private static function loadAdjectiveDictionary()
    {
        $csv = array_map('str_getcsv', file(__DIR__ . '/adjectives.csv'));
        return reset($csv);
    }
}