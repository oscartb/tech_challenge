<?php

declare(strict_types=1);

namespace App\Infrastructure\Bus\Query;

use App\Domain\Shared\Bus\Query\Query;
use App\Domain\Shared\Bus\Query\QueryBus;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use App\Domain\Shared\Bus\Query\Response;

final class InMemorySymfonyQueryBus implements QueryBus
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus) {
        $this->bus = $bus;
    }
    public function ask(Query $query): ?Response
    {
        try {
            /** @var HandledStamp $stamp */
            $stamp = $this->bus->dispatch($query)->last(HandledStamp::class);

            return $stamp->getResult();
        } catch (NoHandlerForMessageException $unused) {
            throw new QueryNotRegisteredError($query);
        }
    }
}
