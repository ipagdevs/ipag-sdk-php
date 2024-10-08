<?php

require_once __DIR__ . '/..' . '/config.php';

try {

    $establishment_id = 100000;
    $transactions = [00001, 00002, 00003];

    $responseDisputes = $ipagClient->establishment()->disputes()->applyDisputes($establishment_id, $transactions);
    $data = $responseDisputes->getData();

    echo "<pre>" . PHP_EOL;
    print_r($data);
    echo "</pre>" . PHP_EOL;

} catch (\Ipag\Sdk\Exception\HttpException $e) {
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