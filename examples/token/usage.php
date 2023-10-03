<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$client = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

$token = new \Ipag\Sdk\Model\Token([
    'card' => [
        'holderName' => 'Frederic Sales',
        'number' => '4111 1111 1111 1111',
        'expiryMonth' => '01',
        'expiryYear' => '2025',
        'cvv' => '123'
    ],
    'holder' => [
        'name' => 'Frederic Sales',
        'cpfCnpj' => '79999338801',
        'mobilePhone' => '1899767866',
        'birthdate' => '1989-03-28',
        'address' => [
            'street' => 'Rua dos Testes',
            'number' => '100',
            'district' => 'Tamboré',
            'zipcode' => '06460080',
            'city' => 'Barueri',
            'state' => 'SP'
        ]
    ]
]);

try {

    $tokenValue = '32e771a2-64d1-4924-b8da-1c552b3269cd';

    // Create
    // $responseToken = $client->token()->create($token);
    // dd($responseToken->getData());

    // Get
    // $responseToken = $client->token()->get($tokenValue);
    // dd($responseToken->getData());

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}