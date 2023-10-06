<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'wayne1',
    'D3F8-E3D981DF-C2766F07-9AC79BD7-A729',
    IpagEnvironment::LOCAL,
);

try {

    $responseTransaction = $ipagClient->transaction()->list([
        'order' => 'desc',
        'from_date' => '2023-10-06'
    ]);

    $data = $responseTransaction->getData();

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
    var_dump($error);
    echo "</pre>" . PHP_EOL;

}