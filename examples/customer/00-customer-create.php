<?php

require_once __DIR__ . '/..' . '/config.php';

$customer = new Ipag\Sdk\Model\Customer([
    'name' => 'Bruce Wayne',
    'email' => 'brucewayne@email.com',
    'cpf_cnpj' => '490.558.550-30',
    'phone' => '(22) 2222-33333',
    'business_name' => 'Wayne Enterprises',
    'birthdate' => '1987-02-19',
    'address' => [
        'street' => 'Avenida Principal',
        'number' => '12345',
        'district' => 'São Paulo',
        'city' => 'São Paulo',
        'state' => 'SP',
        'zipcode' => '01310-000'
    ]
]);

try {

    $responseCustomer = $ipagClient->customer()->create($customer);
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