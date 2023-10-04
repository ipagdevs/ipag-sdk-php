<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
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

    $webhookId = 1;

    // Create
    // $responseWebhook = $ipagClient->webhook()->create($webhook);
    // dd($responseWebhook->getData());

    // Get
    // $responseWebhook = $ipagClient->webhook()->get($webhookId);
    // dd($responseWebhook->getData());

    // List
    // $responseWebhook = $ipagClient->webhook()->list();
    // dd($responseWebhook->getData());

    // Delete
    // $responseWebhook = $ipagClient->webhook()->delete($webhookId);
    // dd($responseWebhook->getData());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}