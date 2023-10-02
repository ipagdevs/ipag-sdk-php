<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        "amount" => 1020.50,
        "callback_url" => "https://99mystore.com.br/ipag/callback",
        "payment" => [
            "type" => "card",
            "method" => "visa",
            "installments" => 1,
            "capture" => false,
            "softdescriptor" => "MYSTORE",
            "fraud_analysis" => true,
            "card" => [
                "holder" => "FULANO DA SILVA",
                "number" => "4111 1111 1111 1111",
                "expiry_month" => "01",
                "expiry_year" => "2025",
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
        "products" => [
            [
                'name' => 'Smart TV LG 55 4K UHD',
                'unit_price' => '3.999',
                'quantity' => 1,
                'sku' => 'LG123',
                'description' => 'Experiência cristalina em 4K.'
            ],
            [
                'name' => 'LED Android TV 4K UHD LED',
                'unit_price' => '2.310',
                'quantity' => 1,
                'sku' => 'SAM123',
                'description' => 'Android TV de 126 cm (50).'
            ],
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