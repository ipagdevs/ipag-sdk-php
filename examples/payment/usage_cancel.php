<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

try {

    $transactionId = 27;
    $transactionUuid = '1ee46630-7056-67e8-ab69-0242ac120006';
    $transactionTid = 'b5a38ba638a5c471e040fe86b4ef4726';
    $orderId = 27;

    //TODO: Testar dos os endpoints

    // Cancel By Id
    // $responsePayment = $ipagClient->payment()->cancelById($transactionId);
    // dd($responsePayment->getData());

    // Cancel By Uuid
    // $responsePayment = $ipagClient->payment()->cancelByUuid($transactionUuid);
    // dd($responsePayment->getData());

    // Cancel By Tid
    // $responsePayment = $ipagClient->payment()->cancelByUuid($transactionTid);
    // dd($responsePayment->getData());

    // Cancel By Order Id
    // $responsePayment = $ipagClient->payment()->cancelByUuid($orderId);
    // dd($responsePayment->getData());

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}