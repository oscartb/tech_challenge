<?php

declare(strict_types=1);

namespace acceptance;

use App\Tests\AcceptanceTester;
use Symfony\Component\HttpFoundation\Response;

class DeckMethodNotAllowedCest
{

    private const SPEC_FILE = 'open-api.yml';
    private const HTTP_METHOD = 'get';

    /**
     * @group api
     */
    public function testDeckEndpointGetNotAllowed(AcceptanceTester $I)
    {
        $url = 'api/deck';
        $I->amOnPage($url);
        $I->wantTo('Get all Cards in a deck');
        $I->haveHttpHeader('Content-Type', 'application/json');

        $I->seeResponseCodeIs(Response::HTTP_METHOD_NOT_ALLOWED);
    }
}
