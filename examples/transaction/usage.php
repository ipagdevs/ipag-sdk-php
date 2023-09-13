<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$client = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

try {

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

    //TODO: Fazer
    // Liberar Recebíveis
    // $client->transaction()->releaseReceivables();

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}