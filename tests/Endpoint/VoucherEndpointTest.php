<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class VoucherEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "data" => (object) [
                        "id" => 45,
                        "uuid" => "asd54sd5f4s56d4f54s5f45f",
                        "resource" => "vouchers"
                    ]
                ]))
            )
        ]);

        $voucher = new \Ipag\Sdk\Model\Voucher([
            'order' => [
                'order_id' => '100012',
                'amount' => 699.99,
                'created_at' => '2020-08-04 21:45:10',
                'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback'
            ],
            'seller' => [
                'cpf_cnpj' => '854.508.440-42'
            ],
            'customer' => [
                'name' => 'FULANO DA SILVA',
                'address' => [
                    'street' => 'Av. Brasil',
                ]
            ]
        ]);

        $responseVoucher = $this->client->voucher()->create($voucher);

        $this->assertIsObject($responseVoucher);

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
                                "seller" =>
                                    [
                                        "Seller is required",
                                        "Seller Invalid; Seller.cpf Cnpj is required",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $voucher = new \Ipag\Sdk\Model\Voucher;

            $this->client->voucher()->create($voucher);

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

            $voucher = new \Ipag\Sdk\Model\Voucher;

            $this->client->voucher()->create($voucher);

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

            $voucher = new \Ipag\Sdk\Model\Voucher;

            $this->client->voucher()->create($voucher);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}