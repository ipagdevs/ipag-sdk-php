<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$client = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$token = new \Ipag\Sdk\Model\Token([
    'card' => [
        'holderName' => 'Frederic Sales',
        'number' => '4024 0071 1251 2933',
        'expiryMonth' => '02',
        'expiryYear' => '2023',
        'cvv' => '431'
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

    $token_value = 'bb999d9f-cae0-400c-81ee-fd476e036b3f';

    // Create
    // $responseToken = $client->token()->create($token);
    // dd($responseToken);

    // Get
    // $responseToken = $client->token()->get($token_value);
    // dd($responseToken);

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}