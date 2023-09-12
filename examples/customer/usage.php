<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Model\Customer;

$client = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$customer = new Ipag\Sdk\Model\Customer([
    'name' => 'Maria da Silva',
    'email' => 'mariadasilva@email.com',
    'cpf_cnpj' => '799.993.388-01',
    'phone' => '(11) 98888-3333',
    'business_name' => 'Maria Ltda.',
    'birthdate' => '1995-02-05',
    'ip' => '177.124.100.173',
    'address' => [
        'street' => 'Avenida Paulista',
        'number' => '01',
        'district' => 'São Paulo',
        'city' => 'São Paulo',
        'state' => 'SP',
        'zipcode' => '01310-930'
    ]
]);

try {

    // Create
    $responseCustomer = $client->customer()->create(new Customer());
    dd($responseCustomer);

    // Update
    // $responseCustomer = $client->customer()->update($customer, 100003);
    // dd($responseCustomer);

    // Get
    // $responseCustomer = $client->customer()->get(100003);
    // dd($responseCustomer);

    // List
    // $responseCustomer = $client->customer()->list([
    //     'name' => 'maria'
    // ]);
    // dd($responseCustomer);

    // Delete
    // $ok = $client->customer()->delete(100003);

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}