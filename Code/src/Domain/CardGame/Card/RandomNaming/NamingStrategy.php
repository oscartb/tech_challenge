<?php

declare(strict_types=1);

namespace App\Domain\CardGame\Card\RandomNaming;

interface NamingStrategy
{
    public static function getRandomName(): string;
}