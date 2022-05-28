<?php

namespace App\Infrastructure\Symfony;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class ErrorController
{
    public function show(Throwable $exception, LoggerInterface $logger): JsonResponse
    {
        return new JsonResponse($exception->getMessage(), $exception->getCode());
    }
}
