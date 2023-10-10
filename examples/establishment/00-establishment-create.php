<?php

require_once __DIR__ . '/..' . '/config.php';

$establishment = new \Ipag\Sdk\Model\Establishment([
    'name' => 'Wayne Enterprises',
    'email' => 'contact@wayneenterprises.com',
    'login' => 'wayne1',
    'password' => 'bat123',
    'document' => '490.558.550-30',
    'phone' => '(22) 2222-33333',
    'is_active' => true,
    'address' =>
        [
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
    ],
    'bank' => [
        'code' => '999',
        'agency' => '1234',
        'account' => '12345',
        'type' => 'checkings',
        'external_id' => '1',
    ]
]);

try {

    $responseEstablishment = $ipagClient->establishment()->create($establishment);
    $data = $responseEstablishment->getData();

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