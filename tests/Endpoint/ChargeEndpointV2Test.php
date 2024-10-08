<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Exception\HttpServerException;
use Ipag\Sdk\Tests\IpagClient;

class ChargeEndpointV2Test extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) []))
            )
        ]);

        $charge_id = 1;

        $chargeResponse = $this->client->chargeV2()->notify($charge_id);

        $this->assertIsObject($chargeResponse);
    }

    public function testShouldResponseFailUnprocessableDataClient()
    {
        $this->expectException(HttpException::class);

        $this->instanceClient([
            new Response(
                406,
                [],
                json_encode(
                    (object) [
                        "code" => "406",
                        "message" =>
                            [
                                "description" =>
                                    [
                                        "Description is required",
                                        "Description must be at least 10 characters long",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        $charge_id = 1;

        $this->client->chargeV2()->notify($charge_id);
    }

    public function testShouldResponseFailUnauthenticatedClient()
    {
        $this->expectException(HttpException::class);

        $this->instanceClient([
            new Response(
                401,
                [],
                json_encode(
                    (object) [
                        "code" => 401,
                        "message" => "Unauthorized",
                        "resource" => "authorization"
                    ]
                )
            )
        ]);

        $charge_id = 1;

        $this->client->chargeV2()->notify($charge_id);
    }

    public function testThrowsServerExceptionOnServerError()
    {
        $this->expectException(HttpServerException::class);

        $this->instanceClient([
            new Response(
                500,
                [],
                json_encode(((object) []))
            )
        ]);

        $charge_id = 1;

        $this->client->chargeV2()->notify($charge_id);
    }

}