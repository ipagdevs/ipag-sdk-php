<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class CheckoutEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "checkout",
                    "attributes" => []
                ]))
            )
        ]);

        $checkout = new \Ipag\Sdk\Model\Checkout([
            'customer' => [
                "name" => "Fulano da Silva",
            ],
            'installment_setting' => [
                "max_installments" => 12,
            ],
            'order' => [
                "order_id" => "100001",
            ],
            'products' => [
                [
                    'name' => 'Smart TV LG 55 4K UHD',
                ],
                [
                    'name' => 'LED Android TV 4K UHD LED',
                ],
            ],
            'split_rules' => [
                [
                    "receiver" => "qwertyuiopasdfghjklzxcvbnm123456",
                ],
                [
                    "receiver" => "654321mnbvcxzlkjhgfdsapoiuytrewq",
                ]
            ],
            'seller_id' => '100014',
            'expires_in' => 60,
        ]);

        $responseCheckout = $this->client->checkout()->create($checkout);

        $this->assertIsObject($responseCheckout);

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
                                "customer" =>
                                    [
                                        "Customer is required",
                                        "Customer Invalid",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $checkout = new \Ipag\Sdk\Model\Checkout([
                'customer' => [
                    "name" => "Fulano da Silva",
                ],
                'installment_setting' => [
                    "max_installments" => 12,
                ],
                'order' => [
                    "order_id" => "100001",
                ],
                'products' => [
                    [
                        'name' => 'Smart TV LG 55 4K UHD',
                    ],
                    [
                        'name' => 'LED Android TV 4K UHD LED',
                    ],
                ],
                'split_rules' => [
                    [
                        "receiver" => "qwertyuiopasdfghjklzxcvbnm123456",
                    ],
                    [
                        "receiver" => "654321mnbvcxzlkjhgfdsapoiuytrewq",
                    ]
                ],
                'seller_id' => '100014',
                'expires_in' => 60,
            ]);

            $this->client->checkout()->create($checkout);

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

            $checkout = new \Ipag\Sdk\Model\Checkout([
                'customer' => [
                    "name" => "Fulano da Silva",
                ],
                'installment_setting' => [
                    "max_installments" => 12,
                ],
                'order' => [
                    "order_id" => "100001",
                ],
                'products' => [
                    [
                        'name' => 'Smart TV LG 55 4K UHD',
                    ],
                    [
                        'name' => 'LED Android TV 4K UHD LED',
                    ],
                ],
                'split_rules' => [
                    [
                        "receiver" => "qwertyuiopasdfghjklzxcvbnm123456",
                    ],
                    [
                        "receiver" => "654321mnbvcxzlkjhgfdsapoiuytrewq",
                    ]
                ],
                'seller_id' => '100014',
                'expires_in' => 60,
            ]);

            $this->client->checkout()->create($checkout);

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

            $checkout = new \Ipag\Sdk\Model\Checkout([
                'customer' => [
                    "name" => "Fulano da Silva",
                ],
                'installment_setting' => [
                    "max_installments" => 12,
                ],
                'order' => [
                    "order_id" => "100001",
                ],
                'products' => [
                    [
                        'name' => 'Smart TV LG 55 4K UHD',
                    ],
                    [
                        'name' => 'LED Android TV 4K UHD LED',
                    ],
                ],
                'split_rules' => [
                    [
                        "receiver" => "qwertyuiopasdfghjklzxcvbnm123456",
                    ],
                    [
                        "receiver" => "654321mnbvcxzlkjhgfdsapoiuytrewq",
                    ]
                ],
                'seller_id' => '100014',
                'expires_in' => 60,
            ]);

            $this->client->checkout()->create($checkout);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}