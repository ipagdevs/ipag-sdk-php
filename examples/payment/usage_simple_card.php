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

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        "amount" => 97.86,
        "callback_url" => "https://ipag-sdk.requestcatcher.com/callback",
        "order_id" => "1234567",
        "payment" => [
            "type" => "card",
            "method" => IpagEnvironment::cardMethods()::VISA,
            "installments" => 1,
            "card" => [
                "holder" => "FULANO DA SILVA",
                "number" => "4111 1111 1111 1111",
                "expiry_month" => "03",
                "expiry_year" => "2021",
                "cvv" => "123"
            ]
        ],
        "customer" => [
            "name" => "Jack Jins",
            "cpf_cnpj" => "799.993.388-01"
        ]
    ]
);

try {

    // Create
    // $responsePayment = $ipagClient->payment()->create($paymentTransaction);
    // dd($responsePayment->getData());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}