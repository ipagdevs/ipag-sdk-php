<?php

require_once __DIR__ . '/..' . '/config.php';

$splitRules = new \Ipag\Sdk\Model\SplitRules([
    "receiver_id" => "100024",
    "percentage" => 10.00
]);

$transactionId = 139;

try {

    $responseSplitRules = $ipagClient->splitRules()->create($splitRules, $transactionId);
    $data = $responseSplitRules->getData();

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