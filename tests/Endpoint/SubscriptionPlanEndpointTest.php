<?php
namespace Ipag\Sdk\Tests\Endpoint;

use GuzzleHttp\Psr7\Response;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Tests\IpagClient;

class SubscriptionPlanEndpointTest extends IpagClient
{
    public function testShouldResponseSuccess()
    {
        $this->instanceClient([
            new Response(
                201,
                [],
                json_encode(((object) [
                    "id" => 1,
                    "type" => "plans",
                    "attributes" => []
                ]))
            )
        ]);

        $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan([
            "name" => "PLANO SILVER",
            "description" => "Plano Silver com até 4 treinos por semana",
            "amount" => 100.99,
            "frequency" => "monthly",
            "interval" => 1,
            "cycles" => 10,
            "best_day" => true,
            "pro_rated_charge" => true,
            "grace_period" => 0,
            "callback_url" => "https://sualoja.com.br/ipag/callback",
            "trial" => [
                'amount' => 100.99,
                'cycles' => 10
            ]
        ]);


        $responseSubscriptionPlan = $this->client->subscriptionPlan()->create($subscriptionPlan);

        $this->assertIsObject($responseSubscriptionPlan);

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

            $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

            $this->client->subscriptionPlan()->create($subscriptionPlan);

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

            $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

            $this->client->subscriptionPlan()->create($subscriptionPlan);

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
                        "resource" => "service.split_rules"
                    ]
                )
            )
        ]);

        try {

            $subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan();

            $this->client->subscriptionPlan()->create($subscriptionPlan);

        } catch (\Throwable $th) {
            $this->assertInstanceOf(HttpException::class, $th);
            $this->assertSame(403, $th->getCode());
        }

    }

}