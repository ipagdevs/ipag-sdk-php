<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Model\Customer;
use Ipag\Sdk\Tests\IpagClient;

class CustomerEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                200,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "uuid" => "abc123",
                    "resource" => "customers",
                    "attributes" => []
                ]))
            )
        ]);

        $c = new Customer([
            'name' => 'Lívia Julia Eduarda Barros',
            'email' => 'livia.julia.barros@eximiart.com.br',
            'cpf_cnpj' => '074.598.263-83',
            'phone' => '(98) 3792-4834',
            'address' => [
                'street' => 'Rua Agenor Vieira',
                'number' => 123,
                'district' => 'São Francisco',
                'city' => 'São Luís',
                'state' => 'MA',
                'zipcode' => '65076-020'
            ]
        ]);

        $responseCustomer = $this->client->customer()->create($c);

        $this->assertIsObject($responseCustomer);
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
                                "name" =>
                                    [
                                        "Name is required",
                                        "Name must not exceed 100 characters",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $c = new Customer();

            $this->client->customer()->create($c);

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

            $c = new Customer();

            $this->client->customer()->create($c);

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
                        "resource" => "customers"
                    ]
                )
            )
        ]);

        try {

            $c = new Customer();

            $this->client->customer()->create($c);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }

}