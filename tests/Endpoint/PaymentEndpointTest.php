<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class PaymentEndpointTest extends IpagClient
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

        $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
            [
                "amount" => 97.86,
                "callback_url" => "https://99mystore.com.br/ipag/callback",
                "order_id" => "1234567",
                "payment" => [
                    "type" => "card",
                    "method" => "visa",
                    "installments" => 1,
                    "card" => [
                        "holder" => "FULANO DA SILVA",
                        "number" => "4111 1111 1111 1111",
                        "expiry_month" => "03",
                        "expiry_year" => "2021",
                        "cvv" => "123"
                    ]
                ],
                "customer" => [
                    "name" => "Jack Jins",
                    "cpf_cnpj" => "799.993.388-01"
                ]
            ]
        );

        $responsePayment = $this->client->payment()->create($paymentTransaction);

        $this->assertIsObject($responsePayment);

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

            $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
                [
                    "amount" => 97.86,
                    "callback_url" => "https://99mystore.com.br/ipag/callback",
                    "order_id" => "1234567",
                    "payment" => [
                        "type" => "card",
                        "method" => "visa",
                        "installments" => 1,
                        "card" => [
                            "holder" => "FULANO DA SILVA",
                            "number" => "4111 1111 1111 1111",
                            "expiry_month" => "03",
                            "expiry_year" => "2021",
                            "cvv" => "123"
                        ]
                    ],
                    "customer" => [
                        "name" => "Jack Jins",
                        "cpf_cnpj" => "799.993.388-01"
                    ]
                ]
            );

            $this->client->payment()->create($paymentTransaction);

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

            $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
                [
                    "amount" => 97.86,
                    "callback_url" => "https://99mystore.com.br/ipag/callback",
                    "order_id" => "1234567",
                    "payment" => [
                        "type" => "card",
                        "method" => "visa",
                        "installments" => 1,
                        "card" => [
                            "holder" => "FULANO DA SILVA",
                            "number" => "4111 1111 1111 1111",
                            "expiry_month" => "03",
                            "expiry_year" => "2021",
                            "cvv" => "123"
                        ]
                    ],
                    "customer" => [
                        "name" => "Jack Jins",
                        "cpf_cnpj" => "799.993.388-01"
                    ]
                ]
            );

            $this->client->payment()->create($paymentTransaction);

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
                        "resource" => "checkout"
                    ]
                )
            )
        ]);

        try {

            $paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
                [
                    "amount" => 97.86,
                    "callback_url" => "https://99mystore.com.br/ipag/callback",
                    "order_id" => "1234567",
                    "payment" => [
                        "type" => "card",
                        "method" => "visa",
                        "installments" => 1,
                        "card" => [
                            "holder" => "FULANO DA SILVA",
                            "number" => "4111 1111 1111 1111",
                            "expiry_month" => "03",
                            "expiry_year" => "2021",
                            "cvv" => "123"
                        ]
                    ],
                    "customer" => [
                        "name" => "Jack Jins",
                        "cpf_cnpj" => "799.993.388-01"
                    ]
                ]
            );

            $this->client->payment()->create($paymentTransaction);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}