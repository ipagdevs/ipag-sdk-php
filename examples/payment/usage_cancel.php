<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

try {

    $transactionId = 27;
    $transactionUuid = '1ee46630-7056-67e8-ab69-0242ac120006';
    $transactionTid = 'b5a38ba638a5c471e040fe86b4ef4726';
    $orderId = 27;

    // Cancel By Id
    // $responsePayment = $ipagClient->payment()->cancelById($transactionId);
    // dd($responsePayment->getData());

    // Cancel By Uuid
    // $responsePayment = $ipagClient->payment()->cancelByUuid($transactionUuid);
    // dd($responsePayment->getData());

    // Cancel By Tid
    // $responsePayment = $ipagClient->payment()->cancelByTid($transactionTid);
    // dd($responsePayment->getData());

    // Cancel By Order Id
    // $responsePayment = $ipagClient->payment()->cancelByOrderId($orderId);
    // dd($responsePayment->getData());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}