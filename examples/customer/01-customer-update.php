<?php

require_once __DIR__ . '/..' . '/config.php';

$customer = new Ipag\Sdk\Model\Customer([
    'name' => 'Arthur Morgan',
    'email' => 'arthurmorgan@email.com',
    'cpf_cnpj' => '212.348.796-11',
    'phone' => '(11) 2222-3333',
    'business_name' => 'Arthur Morgan Ltda.',
    'birthdate' => '1987-11-21',
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

$customerId = 100011;

try {

    $responseCustomer = $ipagClient->customer()->update($customer, $customerId);
    $data = $responseCustomer->getData();

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