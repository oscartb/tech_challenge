<?php

namespace App\Infrastructure\UI\RestAPI\Controller\Deck;

use App\Application\CardGame\Deck\Command\RandomizeDeckCommand;
use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\UI\RestAPI\Controller\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

class DeckPostController extends ApiController
{
    /**
     * @Route("/api/deck/randomize/{uuid}", methods={"POST"})
     */
    public function __invoke(string $uuid, Request $request): Response
    {
        try {
            $uuidVO = new Uuid($uuid);
        } catch (Throwable $e) {
            return new Response('', Response::HTTP_BAD_REQUEST);
        }


        $this->dispatch(
            new RandomizeDeckCommand($uuidVO)
        );

        return new Response('', Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}