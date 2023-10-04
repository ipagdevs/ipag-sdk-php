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
        "amount" => 1020.50,
        "callback_url" => "https://ipag-sdk.requestcatcher.com/callback",
        "payment" => [
            "type" => "card",
            "method" => Ipag\Sdk\Core\Enums\Cards::VISA,
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

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}