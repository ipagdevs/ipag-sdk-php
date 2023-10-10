<?php

require_once __DIR__ . '/..' . '/config.php';

$seller = new Ipag\Sdk\Model\Seller(
    [
        'login' => 'jimgordon',
        'password' => 'jim123',
        'name' => 'Jim Gordon',
        'cpf_cnpj' => '168.853.290-02',
        'email' => 'jimgordon@email.com',
        'phone' => '(11) 3333-44444',
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

try {

    $responseSeller = $ipagClient->seller()->create($seller);
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