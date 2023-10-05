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

$establishmentUuid = '8a8eac8eaeca4d75f0cafc20319c06af';
$transactionUuid = 'a97da629b098b75c294dffdc3e463904';

try {

    $responseTransactions = $ipagClient->establishment()->transaction()->getByEstablishment($establishmentUuid, $transactionUuid);
    $data = $responseTransactions->getData();

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