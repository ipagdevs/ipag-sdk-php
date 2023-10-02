<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        "amount" => 97.86,
        "callback_url" => "https://99mystore.com.br/ipag/callback",
        "order_id" => "1234567",
        "payment" => [
            "type" => "card",
            "method" => "visa",
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

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}