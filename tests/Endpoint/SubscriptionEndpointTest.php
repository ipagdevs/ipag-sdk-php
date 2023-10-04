<?php

namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class SubscriptionEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "resource" => "subscriptions",
                    "attributes" => []
                ]))
            )
        ]);

        $subscription = new \Ipag\Sdk\Model\Subscription([
            'is_active' => true,
            'profile_id' => 'SUB_018',
            'plan_id' => 2,
            'customer_id' => 100003,
            'starting_date' => '2021-07-11',
            'closing_date' => '2021-08-11',
            'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
            'creditcard_token' => null
        ]);

        $responseSubscription = $this->client->subscription()->create($subscription);

        $this->assertIsObject($responseSubscription);

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
                                "profile_id" =>
                                    [
                                        "Profile Id is required",
                                        "Profile Id must not exceed 100 characters",
                                    ]
                            ]
                    ]
                )
            )
        ]);

        try {

            $subscription = new \Ipag\Sdk\Model\Subscription();

            $this->client->subscription()->create($subscription);

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

            $subscription = new \Ipag\Sdk\Model\Subscription();

            $this->client->subscription()->create($subscription);

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
                        "resource" => "subscriptions"
                    ]
                )
            )
        ]);

        try {

            $subscription = new \Ipag\Sdk\Model\Subscription();

            $this->client->subscription()->create($subscription);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }
    }
}