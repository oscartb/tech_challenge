<?php

declare(strict_types=1);

namespace acceptance;

use App\Infrastructure\Persistance\Doctrine\DeckRepository;
use App\Tests\AcceptanceTester;
use Symfony\Component\HttpFoundation\Response;

class GetDeckCardsCest
{

    private DeckRepository $deckRepository;

    public function __construct(DeckRepository $deckRepository)
    {
        $this->deckRepository = $deckRepository;
    }

    private const SPEC_FILE = 'open-api.yml';
    private const HTTP_METHOD = 'get';

    /**
     * @group api
     */
    public function GetDeckCards(AcceptanceTester $I)
    {
        $decks = $this->deckRepository->findAll();
        foreach($decks as $deck)
        {
            var_dump($deck->getId()); exit();
        }

        $url = 'api/deck';
        $I->amOnPage($url);
        $I->wantTo('Get all Cards in a deck');
        $I->haveHttpHeader('Content-Type', 'application/json');

        $I->seeResponseCodeIs(Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
