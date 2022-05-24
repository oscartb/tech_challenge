<?php

declare(strict_types=1);

namespace App\Domain\Shared\Bus\Event;

interface EventBus
{
    public function publish(DomainEvent ...$events): void;
}
