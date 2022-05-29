<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Card;

use App\Application\CardGame\Card\Command\CreateCardCommand;
use App\Application\CardGame\Card\Command\MarkCardForRemovalCommand;
use App\Application\CardGame\Card\Command\RemoveCardCommand;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardDeleteController extends ApiController
{
    /**
     * @Route("/api/card/{uuid}", methods={"DELETE"})
     */
    public function __invoke(string $uuid, Request $request): Response
    {

        $this->dispatch(
            new MarkCardForRemovalCommand(
                $uuid
            )
        );

        return new Response('', Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}