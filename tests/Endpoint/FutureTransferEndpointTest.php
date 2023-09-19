<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class FutureTransferEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "transfers",
                    "attributes" => []
                ]))
            )
        ]);

        $responseTransfers = $this->client->transfer()->future()->list();

        $this->assertIsObject($responseTransfers);

    }
    public function testShouldResponseFailUnauthenticatedClient()
    {
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

        try {

            $responseTransfers = $this->client->transfer()->future()->list();

            $this->assertIsObject($responseTransfers);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(401, $th->getCode());
        }
    }
    public function testShouldResponseFailUnauthorizedClient()
    {
        $this->instanceClient([
            new Response(
                403,
                [],
                json_encode(
                    (object) [
                        "code" => 403,
                        "message" => "Not Authorized",
                        "resource" => "charges"
                    ]
                )
            )
        ]);

        try {

            $responseTransfers = $this->client->transfer()->future()->list();

            $this->assertIsObject($responseTransfers);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }
    }
}