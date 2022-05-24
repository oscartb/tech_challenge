<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony;


abstract class ApiController
{
    public function __construct()
    {

    }
    abstract protected function exceptions(): array;


}
