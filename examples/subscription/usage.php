<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$client = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$subscription = new \Ipag\Sdk\Model\Subscription([
    'is_active' => true,
    'profile_id' => 'SUB_018',
    'plan_id' => 2,
    'customer_id' => 100003,
    'starting_date' => '2021-07-11',
    'closing_date' => '2021-08-11',
    'callback_url' => 'https://minhaloja.com/callback',
    'creditcard_token' => null
]);

try {

    $subscription_id = 1;
    $invoice_number = 1;

    // Create
    // $responseSubscription = $client->subscription()->create(new \Ipag\Sdk\Model\Subscription);
    // dd($responseSubscription);

    // Update
    // $responseSubscription = $client->subscription()->update($subscription, $subscription_id);
    // dd($responseSubscription);

    // Get
    // $responseSubscription = $client->subscription()->get($subscription_id);
    // dd($responseSubscription);

    // List
    // $responseSubscription = $client->subscription()->list([
    //     'is_active' => true,
    // ]);
    // dd($responseSubscription);

    // Desvincular Token
    // $ok = $client->subscription()->unlinkToken($subscription_id);
    // dd($ok);

    // Quitar Parcela
    // $responseSubscription = $client->subscription()->payOffInstallment($subscription_id, $invoice_number);
    // dd($responseSubscription);

    // Agendar Pagamento de Parcela
    // $ok = $client->subscription()->scheduleInstallmentPayment($subscription_id, $invoice_number);
    // dd($ok);

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}