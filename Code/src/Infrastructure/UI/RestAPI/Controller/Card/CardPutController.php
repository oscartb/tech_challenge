<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Card;

use App\Application\CardGame\Card\Command\CreateCardCommand;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardPutController extends ApiController
{
    /**
     * @Route("/api/card/newCard", methods={"PUT"})
     */
    public function __invoke(Request $request): Response
    {
        $requestContent = json_decode($request->getContent());

        $this->dispatch(
            new CreateCardCommand(
                $requestContent->name,
                $requestContent->damage,
                $requestContent->HP
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}