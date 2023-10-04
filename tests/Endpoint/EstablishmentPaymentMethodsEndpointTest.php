<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class EstablishmentPaymentMethodsEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "data" => (object) [
                        "provider" => "stone",
                        "credentials" => [],
                        "active_brands" => [],
                    ]
                ]))
            )
        ]);

        $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';

        $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod([
            'acquirer' => 'stone',
            'priority' => 100,
            'environment' => 'test',
            'capture' => true,
            'retry' => true,
            'credentials' => [
                'stone_code' => 'xxxxx',
                'stone_sak' => 'xxxxxx'
            ],
        ]);

        $responseConfig = $this->client
            ->establishment()
            ->paymentMethods()
            ->config($paymentMethod, $establishment_tid);

        $this->assertIsObject($responseConfig);

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
                                "acquirer" =>
                                    [
                                        "Acquirer is required",
                                        "Acquirer contains an item that is not in the list",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';

            $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod();

            $this->client
                ->establishment()
                ->paymentMethods()
                ->config($paymentMethod, $establishment_tid);

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

            $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';

            $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod();

            $this->client
                ->establishment()
                ->paymentMethods()
                ->config($paymentMethod, $establishment_tid);

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
                        "resource" => "stone"
                    ]
                )
            )
        ]);

        try {

            $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';

            $paymentMethod = new \Ipag\Sdk\Model\PaymentMethod();

            $this->client
                ->establishment()
                ->paymentMethods()
                ->config($paymentMethod, $establishment_tid);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }
}