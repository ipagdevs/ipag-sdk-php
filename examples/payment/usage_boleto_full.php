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
        "amount" => 100,
        "callback_url" => "https://99mystore.com.br/ipag/callback",
        "payment" => [
            "type" => "boleto",
            "method" => IpagEnvironment::bankSlipMethods()::PAGSEGURO,
            "boleto" => [
                "due_date" => "2020-10-20",
                "instructions" => [
                    "Sr. Caixa não receber após o vencimento",
                    "Boleto referente ao pedido 777 na Loja MYSTORE"
                ]
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
                "name" => "Produto de Teste",
                "description" => "Luke Skywalker Real Lightsaber in Blue",
                "unit_price" => 10.0,
                "quantity" => 1,
                "sku" => "PRODTESTE"
            ]
        ]
    ]
);

try {

    // Create
    $responsePayment = $ipagClient->payment()->create($paymentTransaction);
    dd($responsePayment->getData());

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}