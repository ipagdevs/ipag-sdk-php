<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        "amount" => 97.65,
        "callback_url" => "https://9a32ecb90e4cb7ef0f44d6262ec7b5d9.m.pipedream.net",
        "payment" => [
            "type" => "card",
            "installments" => 1,
            "card" => [
                "token" => "32e771a2-64d1-4924-b8da-1c552b3269cd"
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

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}