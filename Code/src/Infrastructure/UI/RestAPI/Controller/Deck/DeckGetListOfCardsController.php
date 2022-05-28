<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Deck;

use App\Application\CardGame\Deck\Command\CreateDeckCommand;
use App\Application\CardGame\Deck\Query\GetListOfCardsInDeckQuery;
use App\Domain\CardGame\Card\Transformer\CardTransformer;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeckGetListOfCardsController extends ApiController
{
    /**
     * @Route("/api/deck/{uuid}", methods={"GET"})
     */
    public function __invoke(string $uuid, Request $request, CardTransformer $cardTransformer): JsonResponse
    {
        $cardsInDeckResponse = $this->ask(new GetListOfCardsInDeckQuery($uuid));

        return new JsonResponse( $cardTransformer->transformFromCollection($cardsInDeckResponse->listOfCards()), Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}