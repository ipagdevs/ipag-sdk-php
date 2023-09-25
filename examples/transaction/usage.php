<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$client = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

try {

    $seller_id = 100014;
    $transaction_id = 28;

    // List
    // $responseTransaction = $client->transaction()->list([
    //     'order' => 'desc',
    //     'from_date' => '2023-08-29'
    // ]);
    // dd($responseTransaction);

    // Get
    // $responseTransaction = $client->transaction()->get($transaction_id);
    // dd($responseTransaction);

    // Liberar Recebíveis
    $ok = $client->transaction()->releaseReceivables($seller_id, $transaction_id);

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}