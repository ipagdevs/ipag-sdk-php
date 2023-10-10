<?php

require_once __DIR__ . '/..' . '/config.php';

$transactionId = 1;
$sellerId = 100002;

try {

    $responseTransaction = $ipagClient->transaction()->releaseReceivables($sellerId, $transactionId);

    $data = $responseTransaction->getData();

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