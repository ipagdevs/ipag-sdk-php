<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class EstablishmentEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "establishments",
                    "attributes" => []
                ]))
            )
        ]);

        $establishment = new \Ipag\Sdk\Model\Establishment([
            'name' => 'Estabelecimento de teste',
            'email' => 'teste@estabteste.com.br',
            'login' => 'estabteste',
            'password' => 'estabteste',
            'document' => '452.262.530-87',
            'phone' => '(62) 98901-4380',
            'is_active' => true,
            'address' =>
                [
                    'street' => 'Rua A',
                ],
            'owner' => [
                'name' => 'Lívia Julia Eduarda Barros',
            ],
            'bank' => [
                'code' => '001'
            ]
        ]);

        $responseEstablishment = $this->client->establishment()->create($establishment);

        $this->assertIsObject($responseEstablishment);

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
                                        "Name must be at least 6 characters long",
                                        "Name must not exceed 100 characters"
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $establishment = new \Ipag\Sdk\Model\Establishment;

            $this->client->establishment()->create($establishment);

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

            $establishment = new \Ipag\Sdk\Model\Establishment;

            $this->client->establishment()->create($establishment);

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

            $establishment = new \Ipag\Sdk\Model\Establishment;

            $this->client->establishment()->create($establishment);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }

}