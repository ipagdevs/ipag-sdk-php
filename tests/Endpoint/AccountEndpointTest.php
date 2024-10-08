<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Exception\HttpServerException;
use Ipag\Sdk\Tests\IpagClient;

class AccountEndpointTest extends IpagClient
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

        $accountResponse = $this->client->account()->myFees();

        $this->assertIsObject($accountResponse);
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

        $this->client->account()->myFees();

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

        $this->client->account()->myFees();
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

        $this->client->paymentLinksV2()->list([]);
    }
}