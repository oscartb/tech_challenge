<?php

declare(strict_types=1);

namespace App\Domain\CardGame\Card;

use RuntimeException;

class CardNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Card does not exist', 404);
    }
}