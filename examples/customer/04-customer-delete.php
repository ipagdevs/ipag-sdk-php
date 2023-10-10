<?php

require_once __DIR__ . '/..' . '/config.php';

$customerId = 100003;

try {

    $responseCustomer = $ipagClient->customer()->delete($customerId);
    $data = $responseCustomer->getData();

    $statusCode = $responseCustomer->getStatusCode();

    if ($statusCode === 200) {
        // Faça algo aqui...
    }

    echo "Status Code: {$statusCode}" . PHP_EOL;

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