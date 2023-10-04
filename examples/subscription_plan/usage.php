<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Exception\HttpException;

$client = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

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
    "callback_url" => "https://ipag-sdk.requestcatcher.com/callback",
    "trial" => [
        'amount' => 100.99,
        'cycles' => 10
    ]
]);

try {

    $subscriptionPlanId = 2;

    // Create
    // $responseSubscriptionPlan = $client->subscriptionPlan()->create($subscriptionPlan);
    // dd($responseSubscriptionPlan->getData());

    // Update
    // $responseSubscriptionPlan = $client->subscriptionPlan()->update($subscriptionPlan, $subscriptionPlanId);
    // dd($responseSubscriptionPlan->getData());

    // Get
    // $responseSubscriptionPlan = $client->subscriptionPlan()->get($subscriptionPlanId);
    // dd($responseSubscriptionPlan->getData());

    // List
    // $responseSubscriptionPlan = $client->subscriptionPlan()->list([
    //     'name' => 'PLANO SILVER',
    // ]);
    // dd($responseSubscriptionPlan->getData());

    // Delete
    // $responseSubscriptionPlan = $client->subscriptionPlan()->delete(5);
    // dd($responseSubscriptionPlan->getStatusCode());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}