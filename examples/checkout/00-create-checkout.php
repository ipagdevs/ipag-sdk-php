<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$ipagClient = new Ipag\Sdk\Core\IpagClient(
    'apiID',
    'apiKey',
    Ipag\Sdk\Core\IpagEnvironment::SANDBOX
);

$checkout = new \Ipag\Sdk\Model\Checkout([
    'customer' => [
        'name' => 'Arthur Morgan',
        'tax_receipt' => '212.348.796-11',
        'email' => 'arthurmorgan@email.com',
        'phone' => '(11) 2222-3333',
        'birthdate' => '1987-11-21',
        'address' => [
            'street' => 'Avenida Paulista',
            'number' => '01',
            'complement' => 'Sala 02',
            'district' => 'São Paulo',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zipcode' => '01310-930',
        ]
    ],
    'installment_setting' => [
        'max_installments' => 12,
        'min_installment_value' => 5,
        'interest' => 0,
        'interest_free_installments' => 12
    ],
    'order' => [
        'order_id' => '100001',
        'amount' => 10000,
        'return_url' => 'https://ipag-sdk.requestcatcher.com/callback',
        'return_type' => 'json'
    ],
    'products' => [
        [
            'name' => 'Smart TV LG 55 4K UHD',
            'unit_price' => 5000,
            'quantity' => 1,
            'sku' => 'LG123',
            'description' => 'Experiência cristalina em 4K.'
        ],
        [
            'name' => 'LED Android TV 4K UHD LED',
            'unit_price' => 5000,
            'quantity' => 1,
            'sku' => 'SAM123',
            'description' => 'Android TV de 126 cm (50).'
        ],
    ],
    'split_rules' => [
        [
            'receiver' => 'vendedor1@email.com',
            'percentage' => '50',
            'charge_processing_fee' => true,
        ],
        [
            'receiver' => 'vendedor2@email.com',
            'percentage' => '20'
        ]
    ],
    'seller_id' => '100014',
    'expires_in' => 60,
]);

try {

    $responseCheckout = $ipagClient->checkout()->create($checkout);
    $data = $responseCheckout->getData();

    echo "<pre>" . PHP_EOL;
    print_r($data);
    echo "</pre>" . PHP_EOL;

} catch (Ipag\Sdk\Exception\HttpException $e) {
    $code = $e->getResponse()->getStatusCode();
    $errors = $e->getErrors();

    echo "<pre>" . PHP_EOL;
    var_dump($code, $errors);
    echo "</pre>" . PHP_EOL;

} catch (Exception $e) {
    $error = $e->getMessage();

    echo "<pre>" . PHP_EOL;
    var_dump($error);
    echo "</pre>" . PHP_EOL;

}