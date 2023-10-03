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

    $sellerId = 100015;

    // Create
    // $responseSeller = $ipagClient->seller()->create($seller);
    // dd($responseSeller->getData());

    // Update
    // $responseSeller = $ipagClient->seller()->update($seller, $sellerId);
    // dd($responseSeller->getData());

    // Get
    // $responseSeller = $ipagClient->seller()->get($sellerId);
    // dd($responseSeller->getData());

    // List
    // $responseSellers = $ipagClient->seller()->list();
    // dd($responseSellers->getData());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}