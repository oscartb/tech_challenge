<?php

declare(strict_types=1);

namespace App\Domain\CardGame\DomainEvent;

use App\Domain\Shared\Bus\Event\DomainEvent;

final class CardCreatedDomainEvent extends DomainEvent
{
    private string $name;
    private int $HP;
    private int $damage;

    public function __construct(
        string $aggregateId,
        string $name,
        int $damage,
        int $HP,
        string $eventId = null,
        string $occurredOn = null
    ){
        parent::__construct($aggregateId,$eventId, $occurredOn);
        $this->name = $name;
        $this->damage = $damage;
        $this->HP = $HP;
    }

    public static function eventName(): string
    {
        return 'card.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): CardCreatedDomainEvent{
        return new self(
            $aggregateId,
            $body['name'],
            $body['damage'],
            $body['HP'],
            $eventId,
            $occurredOn
        );
    }

    public function toPrimitives(): array
    {
        return[
            'name' => $this->name,
            'damage' => $this->damage,
            'HP' => $this->HP
        ];
    }
}