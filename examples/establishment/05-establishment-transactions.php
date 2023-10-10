<?php

require_once __DIR__ . '/..' . '/config.php';

$establishmentUuid = '8a8eac8eaeca4d75f0cafc20319c06af';

try {

    $responseTransactions = $ipagClient->establishment()->transaction()->listByEstablishment($establishmentUuid);
    $data = $responseTransactions->getData();

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