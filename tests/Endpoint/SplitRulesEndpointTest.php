<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class SplitRulesEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "split_rules",
                    "attributes" => []
                ]))
            )
        ]);

        $transactionId = 27;

        $splitRules = new \Ipag\Sdk\Model\SplitRules([
            "receiver_id" => "100014",
            "percentage" => 10.00
        ]);

        $responseRules = $this->client->splitRules()->create($splitRules, $transactionId);

        $this->assertIsObject($responseRules);

    }

    public function testShouldResponseFailUnprocessableDataClient()
    {
        $this->instanceClient([
            new Response(
                406,
                [],
                json_encode(
                    (object) [
                        "code" => "406",
                        "message" =>
                            [
                                "receiver_id" =>
                                    [
                                        "Receiver Id is required",
                                        "Percentage is required",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $transactionId = 27;

            $splitRules = new \Ipag\Sdk\Model\SplitRules([
                "receiver_id" => "100014",
                "percentage" => 10.00
            ]);

            $this->client->splitRules()->create($splitRules, $transactionId);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(406, $th->getCode());
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

            $transactionId = 27;

            $splitRules = new \Ipag\Sdk\Model\SplitRules([
                "receiver_id" => "100014",
                "percentage" => 10.00
            ]);

            $this->client->splitRules()->create($splitRules, $transactionId);

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
                        "resource" => "split_rules"
                    ]
                )
            )
        ]);

        try {

            $transactionId = 27;

            $splitRules = new \Ipag\Sdk\Model\SplitRules([
                "receiver_id" => "100014",
                "percentage" => 10.00
            ]);

            $this->client->splitRules()->create($splitRules, $transactionId);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}