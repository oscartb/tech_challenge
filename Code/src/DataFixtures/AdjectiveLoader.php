<?php

declare(strict_types=1);

namespace App\DataFixtures;

class AdjectiveLoader
{
    public static function loadAdjectiveDictionary()
    {
        $csv = array_map('str_getcsv', file(__DIR__ . '/adjectives.csv'));
        return reset($csv);
    }
}