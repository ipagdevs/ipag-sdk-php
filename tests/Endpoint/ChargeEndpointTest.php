<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class ChargeEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "charges",
                    "attributes" => []
                ]))
            )
        ]);

        $charge = new \Ipag\Sdk\Model\Charge([
            'amount' => 160.50,
            'description' => 'Cobrança referente a negociação de débito pendente na Empresa X',
            'due_date' => '2020-10-30',
            'frequency' => 1,
            'interval' => 'month',
            'type' => 'charge',
            'last_charge_date' => '2020-10-30',
            'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
            'auto_debit' => false,
            'installments' => 12,
            'is_active' => true,
            'products' => [2],
            'customer' => [
                'name' => 'Maria Francisca',
            ],
            'checkout_settings' => [
                'max_installments' => 12,
            ]
        ]);

        $responseCharge = $this->client->charge()->create($charge);

        $this->assertIsObject($responseCharge);

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
                                "amount" =>
                                    [
                                        "Amount is required",
                                        "Amount must be numeric",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $charge = new \Ipag\Sdk\Model\Charge();

            $this->client->charge()->create($charge);

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

            $charge = new \Ipag\Sdk\Model\Charge();

            $this->client->charge()->create($charge);

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

            $charge = new \Ipag\Sdk\Model\Charge();

            $this->client->charge()->create($charge);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}