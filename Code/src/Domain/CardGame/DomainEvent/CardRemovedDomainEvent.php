<?php

namespace App\Domain\CardGame\DomainEvent;

use App\Domain\Shared\Bus\Event\DomainEvent;

final class CardRemovedDomainEvent extends DomainEvent
{
    private string $aggregateId;

    public function __construct(
        string $aggregateId,
        string $eventId = null,
        string $occurredOn = null
    ){
        parent::__construct($aggregateId,$eventId, $occurredOn);
        $this->aggregateId = $aggregateId;
    }

    public static function eventName(): string
    {
        return 'card.removed';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): CardRemovedDomainEvent{
        return new self(
            $aggregateId,
            $eventId,
            $occurredOn
        );
    }

    public function toPrimitives(): array
    {
        return[
            'uuid' => $this->aggregateId
        ];
    }
}