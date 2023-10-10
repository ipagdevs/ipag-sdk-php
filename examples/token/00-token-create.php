<?php

require_once __DIR__ . '/..' . '/config.php';

$token = new \Ipag\Sdk\Model\Token(
    [
        'card' => [
            'holderName' => 'Bruce Wayne',
            'number' => '4111 1111 1111 1111',
            'expiryMonth' => '01',
            'expiryYear' => '2025',
            'cvv' => '123'
        ],
        'holder' => [
            'name' => 'Bruce Wayne',
            'cpfCnpj' => '490.558.550-30',
            'mobilePhone' => '(22) 2222-33333',
            'birthdate' => '1987-02-19',
            'address' => [
                'street' => 'Avenida Principal',
                'number' => '12345',
                'complement' => 'Sala 02',
                'district' => 'São Paulo',
                'city' => 'São Paulo',
                'state' => 'SP',
                'zipcode' => '01310-000'
            ]
        ]
    ]
);

try {

    $responseToken = $ipagClient->token()->create($token);
    $data = $responseToken->getData();

    $tokenValue = $responseToken->getParsedPath('token');
    $validatedAt = $responseToken->getParsedPath('attributes.validated_at');

    echo "Token Value: {$tokenValue}" . PHP_EOL;
    echo "Validated At: {$validatedAt}" . PHP_EOL;

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