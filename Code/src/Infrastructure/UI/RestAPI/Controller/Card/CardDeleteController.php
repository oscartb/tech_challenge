<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Card;

use App\Application\CardGame\Card\Command\CreateCardCommand;
use App\Application\CardGame\Card\Command\MarkCardForRemovalCommand;
use App\Application\CardGame\Card\Command\RemoveCardCommand;
use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

class CardDeleteController extends ApiController
{
    /**
     * @Route("/api/card/{uuid}", methods={"DELETE"})
     */
    public function __invoke(string $uuid, Request $request): JsonResponse
    {
        try {
            $uuidVO = new Uuid($uuid);
        } catch (Throwable $e) {
            return new JsonResponse('', Response::HTTP_BAD_REQUEST);
        }

        $this->dispatch(
            new MarkCardForRemovalCommand(
                $uuidVO
            )
        );

        return new JsonResponse('', Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}