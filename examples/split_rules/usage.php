<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$splitRules = new \Ipag\Sdk\Model\SplitRules([
    "receiver_id" => "100014",
    "percentage" => 10.00
]);

try {

    $split_rule_id = 1;
    $transaction_id = 27;

    //FIXME: Não funciona
    // Create
    $responseSplitRules = $ipagClient->splitRules()->create($splitRules, $transaction_id);
    dd($responseSplitRules->getData());

} catch (\Throwable $e) {
    echo $e->getMessage() . PHP_EOL;
}