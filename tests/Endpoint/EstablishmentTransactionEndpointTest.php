<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class EstablishmentTransactionEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "transactions",
                    "attributes" => []
                ]))
            )
        ]);

        $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';

        $responseTransactions =
            $this->client
                ->establishment()
                ->transaction()
                ->listByEstablishment($establishment_tid);

        $this->assertIsObject($responseTransactions);

    }

    public function testShouldResponseFailUnprocessableDataClient()
    {
        $this->instanceClient([
            new Response(
                404,
                [],
                json_encode(
                    (object) [
                        "code" => "404",
                        "message" => "Establishment Not Found.",
                        "data" => null
                    ]
                )
            )
        ]);

        try {

            $establishment_tid = 'abc';

            $this->client
                ->establishment()
                ->transaction()
                ->listByEstablishment($establishment_tid);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(404, $th->getCode());
        }

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

            $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';

            $this->client
                ->establishment()
                ->transaction()
                ->listByEstablishment($establishment_tid);

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

            $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';

            $this->client
                ->establishment()
                ->transaction()
                ->listByEstablishment($establishment_tid);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}