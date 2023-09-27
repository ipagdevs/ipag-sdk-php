<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$checkout = new \Ipag\Sdk\Model\Checkout([
    'customer' => [
        "name" => "Fulano da Silva",
        "tax_receipt" => "212.348.796-11",
        "email" => "teste@email.com",
        "phone" => "(11) 2222-3333",
        "birthdate" => "1987-11-21",
        "address" => [
            "zipcode" => "01156060",
            "street" => "Rua Júlio Gonzalez",
            "number" => "1023",
            "district" => "Barra Funda",
            "complement" => "Sala 02",
            "city" => "São Paulo",
            "state" => "SP"
        ]
    ],
    'installment_setting' => [
        "max_installments" => 12,
        "min_installment_value" => 5,
        "interest" => 0,
        "interest_free_installments" => 12
    ],
    'order' => [
        "order_id" => "100001",
        "amount" => "15.00",
        "return_url" => "https://www.loja.com.br/callback",
        "return_type" => "json"
    ],
    'products' => [
        [
            'name' => 'Smart TV LG 55 4K UHD',
            "unit_price" => "3.999",
            "quantity" => 1,
            "sku" => "LG123",
            "description" => "Experiência cristalina em 4K."
        ],
        [
            'name' => 'LED Android TV 4K UHD LED',
            "unit_price" => "2.310",
            "quantity" => 1,
            "sku" => "SAM123",
            "description" => "Android TV de 126 cm (50)."
        ],
    ],
    'split_rules' => [
        [
            "receiver" => "qwertyuiopasdfghjklzxcvbnm123456",
            "percentage" => "50",
            "charge_processing_fee" => true,
        ],
        [
            "receiver" => "654321mnbvcxzlkjhgfdsapoiuytrewq",
            "percentage" => "20"
        ]
    ],
    'seller_id' => '100014',
    'expires_in' => 60,
]);

try {

    // Create
    // $responseCheckout = $ipagClient->checkout()->create($checkout);
    // dd($responseCheckout->getData());

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}