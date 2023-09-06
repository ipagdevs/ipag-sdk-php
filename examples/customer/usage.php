<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\EndpointException;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Http\Request\CustomerFiltersRequest;

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

$c2 = new Ipag\Sdk\Model\Customer([
    'name' => 'Mario da Silva',
    'email' => 'mariodasilva@email.com',
]);

$c2->setAddress(new Ipag\Sdk\Model\Address([
    'street' => 'Avenida Atlântica',
    'number' => '02',
    'district' => 'Copacabana',
    'city' => 'Rio de Janeiro',
    'state' => 'RJ',
    'zipcode' => '22021-001'
]));

try {

    // $customer = $client->customer()->create($customer);

    // dd($customer->jsonSerialize());

    $customer = $client->customer()->update(100003, $customer);

    // $customer = $client->customer()->consult(100003);

    dd($customer->jsonSerialize());

    // $result = $client->customer()->delete(100003);

    // new CustomerFiltersRequest([]);

    // $list = $client->customer()->list(new CustomerFiltersRequest([
    //     'order' => 'desc',
    // ]));

    // dd($list->jsonSerialize());

} catch (HttpClientException $e) {
    echo "=> HttpClientException" . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo $e->getResponse()->getBody() . PHP_EOL;
}