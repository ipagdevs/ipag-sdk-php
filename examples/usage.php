<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\EndpointException;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Http\Request\CustomerFiltersRequest;
use Ipag\Sdk\Model\Address;
use Ipag\Sdk\Model\Customer;

$client = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$c = new Customer([
    'name' => 'Lívia Julia Eduarda Barros',
    'email' => 'livia.julia.barros@eximiart.com.br',
    'cpf_cnpj' => '074.598.263-83',
    'phone' => '(98) 3792-4834',
    'address' => [
        'street' => 'Rua Agenor Vieira',
        'number' => 123,
        'district' => 'São Francisco',
        'city' => 'São Luís',
        'state' => 'MA',
        'zipcode' => '65076-020'
    ]
]);

$c2 = new Customer([
    'name' => 'Lucas da Silva Rosa',
    'email' => 'lucas@ipag.com.br',
    'is_active' => false
]);

$c2->setAddress(new Address([
    'street' => 'Rua José Dias Cintra',
    'number' => 318,
    'district' => 'Vl. Ocidental',
    'city' => 'Pres. Prudente',
    'state' => 'São Paulo',
    'zipcode' => '19015-050'
]));

try {

    $customer = $client->customer(new Customer())->create();

    dd($customer->jsonSerialize());

    // $customer = $client->customer($c2)->alter(100003);

    // $customer = $client->customer()->consult(100003);

    // dd($customer->jsonSerialize());

    // $result = $client->customer()->delete(100003);

    // new CustomerFiltersRequest([]);

    // $list = $client->customer()->list(new CustomerFiltersRequest([
    //     'order' => 'desc',
    // ]));

    // dd($list->jsonSerialize());

} catch (EndpointException $e) {
    echo "=> EndpointException" . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
} catch (HttpClientException $e) {
    echo "=> HttpClientException" . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo $e->getResponse()->getBody() . PHP_EOL;
}