<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class EstablishmentAntifraudEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "data" => (object) [
                        "credentials" => [],
                        "active_brands" => [],
                    ]
                ]))
            )
        ]);

        $antifraud = new \Ipag\Sdk\Model\Antifraud(
            [
                "provider" => (
                    new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
                        "token" => "xxxxxxxx",
                        "entityId" => "xxxxxxxx",
                        "channelId" => "xxxxxxxx",
                        "serviceId" => "xxxxxxxx"
                    ])
                )->jsonSerialize(),
                "settings" => [
                    "enable" => true,
                    "environment" => "test",
                    "consult_mode" => "auto",
                    "capture_on_approval" => false,
                    "cancel_on_refused" => true,
                    "review_score_threshold" => 0.8
                ]
            ]
        );

        $establishmentUuid = 'bb36c34eb6644ab9694315af7d68e629';

        $responseConfig = $this->client
            ->establishment()
            ->antifraud()
            ->config($antifraud, $establishmentUuid);

        $this->assertIsObject($responseConfig);

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
                                "acquirer" =>
                                    [
                                        "Acquirer is required",
                                        "Acquirer contains an item that is not in the list",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $antifraud = new \Ipag\Sdk\Model\Antifraud(
                [
                    "provider" => (
                        new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
                            "token" => "xxxxxxxx",
                            "entityId" => "xxxxxxxx",
                            "channelId" => "xxxxxxxx",
                            "serviceId" => "xxxxxxxx"
                        ])
                    )->jsonSerialize(),
                    "settings" => [
                        "enable" => true,
                        "environment" => "test",
                        "consult_mode" => "auto",
                        "capture_on_approval" => false,
                        "cancel_on_refused" => true,
                        "review_score_threshold" => 0.8
                    ]
                ]
            );

            $establishmentUuid = 'bb36c34eb6644ab9694315af7d68e629';

            $this->client
                ->establishment()
                ->antifraud()
                ->config($antifraud, $establishmentUuid);

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

            $antifraud = new \Ipag\Sdk\Model\Antifraud(
                [
                    "provider" => (
                        new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
                            "token" => "xxxxxxxx",
                            "entityId" => "xxxxxxxx",
                            "channelId" => "xxxxxxxx",
                            "serviceId" => "xxxxxxxx"
                        ])
                    )->jsonSerialize(),
                    "settings" => [
                        "enable" => true,
                        "environment" => "test",
                        "consult_mode" => "auto",
                        "capture_on_approval" => false,
                        "cancel_on_refused" => true,
                        "review_score_threshold" => 0.8
                    ]
                ]
            );

            $establishmentUuid = 'bb36c34eb6644ab9694315af7d68e629';

            $this->client
                ->establishment()
                ->antifraud()
                ->config($antifraud, $establishmentUuid);

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
                        "resource" => "stone"
                    ]
                )
            )
        ]);

        try {

            $antifraud = new \Ipag\Sdk\Model\Antifraud(
                [
                    "provider" => (
                        new \Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
                            "token" => "xxxxxxxx",
                            "entityId" => "xxxxxxxx",
                            "channelId" => "xxxxxxxx",
                            "serviceId" => "xxxxxxxx"
                        ])
                    )->jsonSerialize(),
                    "settings" => [
                        "enable" => true,
                        "environment" => "test",
                        "consult_mode" => "auto",
                        "capture_on_approval" => false,
                        "cancel_on_refused" => true,
                        "review_score_threshold" => 0.8
                    ]
                ]
            );

            $establishmentUuid = 'bb36c34eb6644ab9694315af7d68e629';

            $this->client
                ->establishment()
                ->antifraud()
                ->config($antifraud, $establishmentUuid);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}