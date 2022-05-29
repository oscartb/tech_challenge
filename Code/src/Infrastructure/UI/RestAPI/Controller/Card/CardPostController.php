<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Card;

use App\Application\CardGame\Card\Command\UpdateCardCommand;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardPostController extends ApiController
{
    /**
     * @Route("/api/card/{uuid}", methods={"POST"})
     */
    public function __invoke(string $uuid, Request $request): Response
    {
        $requestContent = json_decode($request->getContent());

        $this->dispatch(
            new UpdateCardCommand(
                $uuid,
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