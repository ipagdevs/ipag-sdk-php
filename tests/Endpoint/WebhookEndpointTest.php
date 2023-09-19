<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class WebhookEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "webhooks",
                    "attributes" => []
                ]))
            )
        ]);

        $webhook = new \Ipag\Sdk\Model\Webhook([
            'http_method' => 'POST',
            'url' => 'https://minhaloja.com.br/callback',
            'description' => 'Webhook para receber notificações de atualização das transações',
            'actions' => [
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_SUCCEEDED,
                \Ipag\Sdk\Core\IpagEnvironment::webhook()::PAYMENT_LINK_PAYMENT_FAILED,
            ]
        ]);

        $responseWebhook = $this->client->webhook()->create($webhook);

        $this->assertIsObject($responseWebhook);

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
                                "http_method" =>
                                    [
                                        "Http Method is required",
                                        "Http Method contains an item that is not in the list",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $webhook = new \Ipag\Sdk\Model\Webhook;

            $this->client->webhook()->create($webhook);

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

            $webhook = new \Ipag\Sdk\Model\Webhook;

            $this->client->webhook()->create($webhook);

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

            $webhook = new \Ipag\Sdk\Model\Webhook;

            $this->client->webhook()->create($webhook);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}