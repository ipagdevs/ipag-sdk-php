<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$client = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

$subscription = new \Ipag\Sdk\Model\Subscription([
    'is_active' => true,
    'profile_id' => 'SUB_021',
    'plan_id' => 2,
    'customer_id' => 100003,
    'starting_date' => '2021-07-11',
    'closing_date' => '2021-08-11',
    'callback_url' => 'https://minhaloja.com/callback',
    'creditcard_token' => null
]);

try {

    $subscriptionId = 1;
    $invoiceNumber = 1;

    // Create
    // $responseSubscription = $client->subscription()->create($subscription);
    // dd($responseSubscription->getData());

    // Update
    // $responseSubscription = $client->subscription()->update($subscription, $subscriptionId);
    // dd($responseSubscription->getData());

    // Get
    // $responseSubscription = $client->subscription()->get($subscriptionId);
    // dd($responseSubscription->getData());

    // List
    // $responseSubscription = $client->subscription()->list([
    //     'is_active' => true,
    // ]);
    // dd($responseSubscription->getData());

    // Desvincular Token
    // $responseSubscription = $client->subscription()->unlinkToken($subscriptionId);
    // dd($responseSubscription->getData());

    // Quitar Parcela
    // $responseSubscription = $client->subscription()->payOffInstallment($subscriptionId, $invoiceNumber);
    // dd($responseSubscription->getData());

    // Agendar Pagamento de Parcela
    // $responseSubscription = $client->subscription()->scheduleInstallmentPayment($subscriptionId, $invoiceNumber);
    // dd($responseSubscription->getData());

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}