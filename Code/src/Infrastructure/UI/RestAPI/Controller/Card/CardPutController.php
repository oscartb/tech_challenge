<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Card;

use App\Application\CardGame\Card\Command\CreateCardCommand;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CardPutController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(
            new CreateCardCommand(
                $request->request->get('name'),
                $request->request->get('damage'),
                $request->request->get('hp')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}