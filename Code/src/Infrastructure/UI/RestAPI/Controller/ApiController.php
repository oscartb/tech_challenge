<?php

declare(strict_types=1);

namespace App\Infrastructure\UI\RestAPI\Controller;

use App\Domain\Shared\Bus\Command\Command;
use App\Domain\Shared\Bus\Command\CommandBus;
use App\Domain\Shared\Bus\Query\Query;
use App\Domain\Shared\Bus\Query\QueryBus;
use App\Domain\Shared\Bus\Query\Response;
use App\Infrastructure\Symfony\ApiExceptionsHttpStatusCodeMapping;
use function Lambdish\Phunctional\each;

abstract class ApiController
{
    private QueryBus                           $queryBus;
    private CommandBus                         $commandBus;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    ) {
        $this->queryBus   = $queryBus;
        $this->commandBus = $commandBus;

        each(
            fn(int $httpCode, string $exceptionClass) => $exceptionHandler->register($exceptionClass, $httpCode),
            $this->exceptions()
        );
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}