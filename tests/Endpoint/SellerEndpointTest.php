<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class SellerEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "sellers",
                    "attributes" => []
                ]))
            )
        ]);

        $seller = new \Ipag\Sdk\Model\Seller([
            "login" => "josefrancisco",
            "password" => "123123",
            "name" => "José Francisco Chicó",
            "cpf_cnpj" => "854.508.440-42",
            "email" => "jose@mail.me",
            "phone" => "(11) 98712-1234",
            "description" => "XXXXXXXXXXXXXX",
            "address" => [
                "street" => "Rua Júlio Gonzalez",
            ],
            "owner" => [
                "name" => "Giosepe",
            ],
            "bank" => [
                "code" => "290",
            ]
        ]);

        $responseSeller = $this->client->seller()->create($seller);

        $this->assertIsObject($responseSeller);

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
                                "login" =>
                                    [
                                        "Login is required",
                                        "Login must be at least 6 characters long",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $seller = new \Ipag\Sdk\Model\Seller([
                "login" => "josefrancisco",
                "password" => "123123",
                "name" => "José Francisco Chicó",
                "cpf_cnpj" => "854.508.440-42",
                "email" => "jose@mail.me",
                "phone" => "(11) 98712-1234",
                "description" => "XXXXXXXXXXXXXX",
                "address" => [
                    "street" => "Rua Júlio Gonzalez",
                ],
                "owner" => [
                    "name" => "Giosepe",
                ],
                "bank" => [
                    "code" => "290",
                ]
            ]);

            $this->client->seller()->create($seller);

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

            $seller = new \Ipag\Sdk\Model\Seller([
                "login" => "josefrancisco",
                "password" => "123123",
                "name" => "José Francisco Chicó",
                "cpf_cnpj" => "854.508.440-42",
                "email" => "jose@mail.me",
                "phone" => "(11) 98712-1234",
                "description" => "XXXXXXXXXXXXXX",
                "address" => [
                    "street" => "Rua Júlio Gonzalez",
                ],
                "owner" => [
                    "name" => "Giosepe",
                ],
                "bank" => [
                    "code" => "290",
                ]
            ]);

            $this->client->seller()->create($seller);

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

            $seller = new \Ipag\Sdk\Model\Seller([
                "login" => "josefrancisco",
                "password" => "123123",
                "name" => "José Francisco Chicó",
                "cpf_cnpj" => "854.508.440-42",
                "email" => "jose@mail.me",
                "phone" => "(11) 98712-1234",
                "description" => "XXXXXXXXXXXXXX",
                "address" => [
                    "street" => "Rua Júlio Gonzalez",
                ],
                "owner" => [
                    "name" => "Giosepe",
                ],
                "bank" => [
                    "code" => "290",
                ]
            ]);

            $this->client->seller()->create($seller);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}