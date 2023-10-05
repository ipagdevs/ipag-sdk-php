<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Exception\HttpException;

$client = new IpagClient(
    'wayne1',
    'D3F8-E3D981DF-C2766F07-9AC79BD7-A729',
    IpagEnvironment::LOCAL,
);

$token = new \Ipag\Sdk\Model\Token([
    'card' => [
        'holderName' => 'Bruce Wayne',
        'number' => '4111 1111 1111 1111',
        'expiryMonth' => '01',
        'expiryYear' => '2025',
        'cvv' => '123',
    ],
    'holder' => [
        'name' => 'Bruce Wayne',
        'cpfCnpj' => '490.558.550-30',
        'mobilePhone' => '(22) 2222-33333',
        'birthdate' => '1987-02-19',
        'address' => [
            'street' => 'Avenida Principal',
            'number' => '12345',
            "complement" => "Sala 02",
            'district' => 'São Paulo',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zipcode' => '01310-000'
        ]
    ]
]);

try {

    $tokenValue = '552af952-e189-45d5-b974-e5bb87385e01';

    // Create
    $responseToken = $client->token()->create($token);
    dd($responseToken->getData());

    // Get
    // $responseToken = $client->token()->get($tokenValue);
    // dd($responseToken->getData());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}