<?php

declare(strict_types=1);

namespace acceptance;

use App\Tests\AcceptanceTester;
use Symfony\Component\HttpFoundation\Response;

class FirstCest
{

    private const SPEC_FILE = 'open-api.yml';
    private const HTTP_METHOD = 'get';

    /**
     * @group current
     */
    public function testGetZoneController(AcceptanceTester $I)
    {
        $url = '/zones';

        $I->wantTo('Get all zones');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->amAuthenticated();

        $I->seeRequestIsValid(self::SPEC_FILE, $url, self::HTTP_METHOD, [], []);

        $I->seeResponseCodeIs(Response::HTTP_OK);
        $I->seeResponseIsJson();
        //$I->seeResponseContainsJson(['uuid' => VehicleFixture::REGISTERED_VEHICLE_UUID_1]);
        //$I->seeResponseContainsJson(['current_sales_order' => ['sales_order_uuid' => SalesOrderFixture::UUID]]);
        $response = $I->grabResponse();
        $I->assertContains('id', $response);
    }
}
