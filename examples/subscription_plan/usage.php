<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$client = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

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

try {

    $subscriptionPlan_id = 1;

    // Create
    // $responseSubscriptionPlan = $client->subscriptionPlan()->create($subscriptionPlan);
    // dd($responseSubscriptionPlan);

    // Update
    // $responseSubscriptionPlan = $client->subscriptionPlan()->update($subscriptionPlan, $subscriptionPlan_id);
    // dd($responseSubscriptionPlan);

    // Get
    // $responseSubscriptionPlan = $client->subscriptionPlan()->get($subscriptionPlan_id);
    // dd($responseSubscriptionPlan);

    // List
    // $responseSubscriptionPlan = $client->subscriptionPlan()->list([
    //     'name' => 'PLANO SILVER',
    // ]);
    // dd($responseSubscriptionPlan);

    // Delete
    // $client->subscriptionPlan()->delete($subscriptionPlan_id);

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}