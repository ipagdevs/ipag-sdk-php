<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class TokenEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "token" => "AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA",
                    "resource" => "card_token",
                    "attributes" => []
                ]))
            )
        ]);

        $token = new \Ipag\Sdk\Model\Token([
            'card' => [
                'holderName' => 'Frederic Sales',
                'number' => '4024 0071 1251 2933',
                'expiryMonth' => '02',
                'expiryYear' => '2023',
                'cvv' => '431'
            ],
            'holder' => [
                'name' => 'Frederic Sales',
                'cpfCnpj' => '79999338801',
                'mobilePhone' => '1899767866',
                'birthdate' => '1989-03-28',
                'address' => [
                    'street' => 'Rua dos Testes',
                    'number' => '100',
                    'district' => 'Tamboré',
                    'zipcode' => '06460080',
                    'city' => 'Barueri',
                    'state' => 'SP'
                ]
            ]
        ]);

        $responseToken = $this->client->token()->create($token);

        $this->assertIsObject($responseToken);

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
                                "card" =>
                                    [
                                        "Card is required",
                                        "Card Invalid",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $token = new \Ipag\Sdk\Model\Token();

            $this->client->token()->create($token);

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

            $token = new \Ipag\Sdk\Model\Token();

            $this->client->token()->create($token);

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
                        "resource" => "card_token"
                    ]
                )
            )
        ]);

        try {

            $token = new \Ipag\Sdk\Model\Token();

            $this->client->token()->create($token);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}