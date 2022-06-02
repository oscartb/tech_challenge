<?php

declare(strict_types=1);

namespace App\DataFixtures;

class Dictionary
{
    private iterable $namingStrategies;

    public function __construct(iterable $namingStrategies)
    {
        $this->namingStrategies = iterator_to_array($namingStrategies);
    }

    public function getRandomName()
    {
        $randomSelectedStrategy = $this->namingStrategies[rand(0, count($this->namingStrategies) - 1)] ;
        return $randomSelectedStrategy->getRandomName();
    }
}