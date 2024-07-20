<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Deck;

use App\Application\CardGame\Deck\Command\CreateDeckCommand;
use App\Application\CardGame\Deck\Query\GetListOfCardsInDeckQuery;
use App\Domain\CardGame\Card\Transformer\CardTransformer;
use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

class DeckGetListOfCardsController extends ApiController
{
    /**
     * @Route("/api/deck/{uuid}", methods={"GET"})
     */
    public function __invoke(string $uuid, Request $request, CardTransformer $cardTransformer): JsonResponse
    {
        try {
            $uuidVO = new Uuid($uuid);
        } catch (Throwable $e) {
            return new JsonResponse('', Response::HTTP_BAD_REQUEST);
        }

        $cardsInDeckResponse = $this->ask(new GetListOfCardsInDeckQuery($uuidVO));

        return new JsonResponse( $cardTransformer->transformFromCollection($cardsInDeckResponse->listOfCards()), Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}
