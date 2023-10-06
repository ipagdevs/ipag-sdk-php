<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX,
);

$subscription = new \Ipag\Sdk\Model\Subscription(
    [
        'is_active' => true,
        'profile_id' => 'SUB_004',
        'plan_id' => 19,
        'customer_id' => 100020,
        'starting_date' => '2023-10-25',
        'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
        'creditcard_token' => '552af952-e189-45d5-b974-e5bb87385e01'
    ]
);

try {

    $responseSubscription = $ipagClient->subscription()->create($subscription);
    $data = $responseSubscription->getData();

    $statusSubscription = $responseSubscription->getParsedPath('attributes.status');

    echo "Status da Assinatura: {$statusSubscription}" . PHP_EOL;

    echo "<pre>" . PHP_EOL;
    print_r($data);
    echo "</pre>" . PHP_EOL;

} catch (HttpException $e) {
    $code = $e->getResponse()->getStatusCode();
    $errors = $e->getErrors();

    echo "<pre>" . PHP_EOL;
    var_dump($code, $errors);
    echo "</pre>" . PHP_EOL;

} catch (Exception $e) {
    $error = $e->getMessage();

    echo "<pre>" . PHP_EOL;
    var_dump($error);
    echo "</pre>" . PHP_EOL;

}