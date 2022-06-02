<?php

declare(strict_types=1);

namespace App\DataFixtures;

class NameLoader
{
    public static function loadNameDictionary()
    {
        $csv = array_map('str_getcsv', file(__DIR__ . '/names.csv'));
        return reset($csv);
    }
}