<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

try {
    $transferId = 1;
    $sellerId = 1;
    $sellerCpf = '85450844042';

    // List
    // $responseTransfers = $ipagClient->transfer()->list();
    // dd($responseTransfers->getData());

    // Get
    // $responseTransfers = $ipagClient->transfer()->get($transferId);
    // dd($responseTransfers->getData());

    // Sellers List
    // $responseTransfers = $ipagClient->transfer()->seller()->list();
    // dd($responseTransfers->getData());

    // Sellers Get
    // $responseTransfers = $ipagClient->transfer()->seller()->get($transferId);
    // dd($responseTransfers->getData());

    // Future List
    // $responseTransfers = $ipagClient->transfer()->future()->list();
    // dd($responseTransfers->getData());

    // Future List Seller By Id
    // $responseTransfers = $ipagClient->transfer()->future()->listBySellerId($sellerId);
    // dd($responseTransfers->getData());

    // Future List Seller By CpfCnpj
    // $responseTransfers = $ipagClient->transfer()->future()->listBySellerCpfCnpj($sellerCpf);
    // dd($responseTransfers->getData());

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}