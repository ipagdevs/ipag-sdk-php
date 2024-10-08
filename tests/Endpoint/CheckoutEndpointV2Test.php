<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Exception\HttpServerException;
use Ipag\Sdk\Tests\IpagClient;

class CheckoutEndpointV2Test extends IpagClient
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

        $checkoutResponse = $this->client->checkoutV2()->getInstallments();

        $this->assertIsObject($checkoutResponse);
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

        $this->client->checkoutV2()->getInstallments();
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

        $this->client->checkoutV2()->getInstallments();
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

        $this->client->checkoutV2()->getInstallments();
    }
}