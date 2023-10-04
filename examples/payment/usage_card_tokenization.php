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
        "amount" => 97.65,
        "callback_url" => "https://ipag-sdk.requestcatcher.com/callback",
        "payment" => [
            "type" => "card",
            "method" => Ipag\Sdk\Core\Enums\Cards::VISA,
            "installments" => 1,
            "card" => [
                "tokenize" => true,
                "holder" => "FULANO DA SILVA",
                "number" => "4532 2876 7749 2847",
                "expiry_month" => "03",
                "expiry_year" => "2024",
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