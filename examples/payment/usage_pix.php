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
        "callback_url" => "https://99mystore.com.br/ipag/callback",
        "order_id" => "1234567",
        "payment" => [
            "type" => IpagEnvironment::otherPaymentMethods()::PIX,
            "method" => IpagEnvironment::otherPaymentMethods()::PIX,
            "pix_expires_in" => 60
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
            ],
            "shipping_address" => [
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
                "name" => "Luke Skywalker Lightsaber Blue",
                "description" => "Luke Skywalker Real Lightsaber in Blue",
                "unit_price" => 100.0,
                "quantity" => 1,
                "sku" => "LIGHTSIDE"
            ]
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