<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class PaymentLinksEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "payment_links",
                    "attributes" => []
                ]))
            )
        ]);

        $paymentLink = new \Ipag\Sdk\Model\PaymentLink([
            'external_code' => '131',
            'amount' => 0,
            'description' => 'LINK DE PAGAMENTO SUPER BACANA',
            'expireAt' => '2020-12-30 23:00:00',
            'buttons' => [
                'enable' => false,
            ],
            'checkout_settings' => [
                'max_installments' => 12,
            ],
        ]);

        $responsePaymentLink = $this->client->paymentLinks()->create($paymentLink);

        $this->assertIsObject($responsePaymentLink);

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

        try {

            $paymentLink = new \Ipag\Sdk\Model\PaymentLink();

            $this->client->paymentLinks()->create($paymentLink);

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

            $paymentLink = new \Ipag\Sdk\Model\PaymentLink();

            $this->client->paymentLinks()->create($paymentLink);

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
                        "resource" => "payment_links"
                    ]
                )
            )
        ]);

        try {

            $paymentLink = new \Ipag\Sdk\Model\PaymentLink();

            $this->client->paymentLinks()->create($paymentLink);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }
    }
}