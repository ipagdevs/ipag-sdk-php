<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

$ipagClient = new Ipag\Sdk\Core\IpagClient(
    'apiID',
    'apiKey',
    Ipag\Sdk\Core\IpagEnvironment::SANDBOX,
);

$tokenValue = '552af952-e189-45d5-b974-e5bb87385e01';

try {

    $responseToken = $ipagClient->token()->get($tokenValue);
    $data = $responseToken->getData();

    $validatedAt = $responseToken->getParsedPath('attributes.validated_at');

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