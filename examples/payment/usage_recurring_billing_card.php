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
        "amount" => 99.0,
        "callback_url" => "https://99mystore.com.br/ipag/callback",
        "payment" => [
            "type" => "card",
            "method" => IpagEnvironment::cardMethods()::VISA,
            "installments" => 1,
            "capture" => true,
            "card" => [
                "holder" => "FULANO DA SILVA",
                "number" => "4111 1111 1111 1111",
                "expiry_month" => "03",
                "expiry_year" => "2021",
                "cvv" => "123"
            ]
        ],
        "customer" => [
            "name" => "Fulano da Silva",
            "cpf_cnpj" => "79999338801",
            "phone" => "(11) 99719-2099",
            "email" => "fulano@mail.me",
            "birthdate" => "1989-03-28",
            "ip" => "192.168.0.1",
            "billing_address" => [
                "street" => "Rua Júlio Gonzalez",
                "number" => "1023",
                "district" => "Barra Funda",
                "complement" => "Sala 02",
                "city" => "São Paulo",
                "state" => "SP",
                "zipcode" => "01156-060"
            ]
        ],
        "subscription" => [
            "frequency" => 1,
            "interval" => "month",
            "start_date" => "2020-10-18"
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