<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'master',
    'FC92-2F86859F-225B4C88-3FFEA3CA-6CE5',
    IpagEnvironment::LOCAL,
);

$establishment = new \Ipag\Sdk\Model\Establishment([
    'name' => 'Wayne Enterprises',
    'phone' => '(22) 2222-33333',
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

$establishmentUuid = '8a8eac8eaeca4d75f0cafc20319c06af';

try {

    $responseEstablishment = $ipagClient->establishment()->update($establishment, $establishmentUuid);
    $data = $responseEstablishment->getData();

    echo "<pre>" . PHP_EOL;
    print_r($data);
    echo "</pre>" . PHP_EOL;

} catch (HttpException $e) {
    $code = $e->getResponse()->getStatusCode();
    $errors = $e->getErrors();

    echo "<pre>" . PHP_EOL;
    var_dump($code, $errors);
    echo "</pre>" . PHP_EOL;

} catch (Exception $e) {
    $error = $e->getMessage();

    echo "<pre>" . PHP_EOL;
    var_dump($code, $errors);
    echo "</pre>" . PHP_EOL;

}