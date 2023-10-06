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

$webhook = new \Ipag\Sdk\Model\Webhook([
    'http_method' => 'POST',
    'url' => 'https://ipag-sdk.requestcatcher.com/webhook',
    'description' => 'Webhook para receber notificações de atualização das transações',
    'actions' => [
        Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_SUCCEEDED,
        Ipag\Sdk\Core\Enums\Webhooks::PAYMENT_LINK_PAYMENT_FAILED,
        Ipag\Sdk\Core\Enums\Webhooks::CHARGE_PAYMENT_SUCCEEDED,
        Ipag\Sdk\Core\Enums\Webhooks::CHARGE_PAYMENT_FAILED,
        Ipag\Sdk\Core\Enums\Webhooks::SUBSCRIPTION_PAYMENT_FAILED,
        Ipag\Sdk\Core\Enums\Webhooks::SUBSCRIPTION_PAYMENT_SUCCEEDED,
    ]
]);

try {

    $responseWebhook = $ipagClient->webhook()->create($webhook);
    $data = $responseWebhook->getData();

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