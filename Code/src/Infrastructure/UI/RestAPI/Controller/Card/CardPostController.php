<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Card;

use App\Application\CardGame\Card\Command\UpdateCardCommand;
use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

class CardPostController extends ApiController
{
    /**
     * @Route("/api/card/{uuid}", methods={"POST"})
     */
    public function __invoke(string $uuid, Request $request): Response
    {
        try {
            $uuidVO = new Uuid($uuid);
        } catch (Throwable $e) {
            return new JsonResponse('', Response::HTTP_BAD_REQUEST);
        }

        $requestContent = json_decode($request->getContent());

        $this->dispatch(
            new UpdateCardCommand(
                $uuidVO,
                $requestContent->name,
                $requestContent->damage,
                $requestContent->HP
            )
        );

        return new Response('', Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}