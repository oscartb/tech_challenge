<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Card;

use App\Application\CardGame\Card\Command\CreateCardCommand;
use App\Application\CardGame\Card\Command\RemoveCardCommand;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardDeleteController extends ApiController
{
    /**
     * @Route("/api/card", methods={"DELETE"})
     */
    public function __invoke(Request $request): Response
    {
        $requestContent = json_decode($request->getContent());

        $this->dispatch(
            new RemoveCardCommand(
                $requestContent->uuid
            )
        );

        return new Response('', Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}