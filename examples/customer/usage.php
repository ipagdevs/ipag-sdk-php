<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Exception\HttpException;

$client = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

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

    $customerId = 100011;

    // Create
    // $responseCustomer = $client->customer()->create($customer);
    // dd($responseCustomer->getData());

    // Update
    // $responseCustomer = $client->customer()->update($customer, $customerId);
    // dd($responseCustomer->getData());

    // Get
    // $responseCustomer = $client->customer()->get($customerId);
    // dd($responseCustomer->getData());

    // List
    // $responseCustomer = $client->customer()->list([
    //     'name' => 'maria'
    // ]);
    // dd($responseCustomer->getData());

    // Delete
    // $responseCustomer = $client->customer()->delete($customerId);
    // dd($responseCustomer->getStatusCode());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}