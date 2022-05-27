<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Deck;

use App\Application\CardGame\Deck\Command\CreateDeckCommand;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeckPutController extends ApiController
{
    /**
     * @Route("/api/deck", methods={"PUT"})
     */
    public function __invoke(Request $request): Response
    {
        $this->dispatch(
            new CreateDeckCommand()
        );

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}