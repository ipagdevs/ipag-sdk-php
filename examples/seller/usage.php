<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$seller = new \Ipag\Sdk\Model\Seller([
    "login" => "mariajose",
    "password" => "123123",
    "name" => "Maria José",
    "cpf_cnpj" => "567.335.070-80",
    "email" => "maria@mail.me",
    "phone" => "(11) 98712-1234",
    "description" => "XXXXXXXXXXXXXX",
    "address" => [
        "street" => "Rua Júlio Gonzalez",
    ],
    "owner" => [
        "name" => "Giosepe",
    ],
    "bank" => [
        "code" => "290",
    ]
]);

try {

    $seller_id = 100015;

    // Create
    // $responseSeller = $ipagClient->seller()->create($seller);
    // dd($responseSeller->getData());

    // Update
    // $responseSeller = $ipagClient->seller()->update($seller, $seller_id);
    // dd($responseSeller->getData());

    // Get
    // $responseSeller = $ipagClient->seller()->get($seller_id);
    // dd($responseSeller->getData());

    // List
    // $responseSellers = $ipagClient->seller()->list();
    // dd($responseSellers->getData());

} catch (\Throwable $e) {
    echo $e->getMessage() . PHP_EOL;
}