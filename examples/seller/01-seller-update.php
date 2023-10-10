<?php

require_once __DIR__ . '/..' . '/config.php';

$seller = new Ipag\Sdk\Model\Seller(
    [
        'name' => 'Alfred Pennyworth',
        'cpf_cnpj' => '194.448.960-64',
        'email' => 'alfredpenny@email.com',
        'phone' => '(11) 1111-22222',
        'description' => '',
        'address' => [
            'street' => 'Avenida Principal',
            'number' => '12345',
            'district' => 'São Paulo',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zipcode' => '01310-000'
        ],
        'owner' => [
            'name' => 'Bruce Wayne',
            'email' => 'brucewayne@email.com',
            'cpf' => '490.558.550-30',
            'phone' => '(22) 2222-33333',
            'birthdate' => '1987-02-19',
        ],
        'bank' => [
            'code' => '999',
            'agency' => '1234',
            'account' => '54321',
            'type' => 'checkings',
            'external_id' => '1',
        ]
    ]
);

$sellerId = 100022;

try {

    $responseSeller = $ipagClient->seller()->update($seller, $sellerId);
    $data = $responseSeller->getData();

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