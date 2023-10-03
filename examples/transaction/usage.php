<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Exception\HttpException;

$client = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

try {

    $sellerId = 100014;
    $transactionId = 28;

    // List
    // $responseTransaction = $client->transaction()->list([
    //     'order' => 'desc',
    //     'from_date' => '2023-08-29'
    // ]);
    // dd($responseTransaction->getData());

    // Get
    // $responseTransaction = $client->transaction()->get($transactionId);
    // dd($responseTransaction->getData());

    // Liberar Recebíveis
    // $responseTransaction = $client->transaction()->releaseReceivables($sellerId, $transactionId);
    // dd($responseTransaction->getStatusCode());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}