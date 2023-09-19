<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

try {
    $transfer_id = 1;
    $seller_id = 1;
    $seller_cpf = '07459826383';

    // List
    // $responseTransfers = $ipagClient->transfer()->list();
    // dd($responseTransfers);

    // Get
    // $responseTransfers = $ipagClient->transfer()->get($transfer_id);
    // dd($responseTransfers);

    //TODO: testar mais tarde, quando tiver registros
    // Sellers List
    // $responseTransfers = $ipagClient->transfer()->seller()->list();
    // dd($responseTransfers);

    // Sellers Get
    // $responseTransfers = $ipagClient->transfer()->seller()->get($transfer_id);
    // dd($responseTransfers);

    // Future List
    // $responseTransfers = $ipagClient->transfer()->future()->list();
    // dd($responseTransfers);

    // Future List Seller By Id
    // $responseTransfers = $ipagClient->transfer()->future()->listBySellerId($seller_id);
    // dd($responseTransfers);

    // Future List Seller By CpfCnpj
    // $responseTransfers = $ipagClient->transfer()->future()->listBySellerCpfCnpj($seller_cpf);
    // dd($responseTransfers);

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}