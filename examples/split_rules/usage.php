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

    $splitRuleId = 6;
    $transactionId = 27;

    // Create
    // $responseSplitRules = $ipagClient->splitRules()->create($splitRules, $transactionId);
    // dd($responseSplitRules->getData());

    // Get
    // $responseSplitRules = $ipagClient->splitRules()->get($splitRuleId, $transactionId);
    // dd($responseSplitRules->getData());

    // List
    // $responseSplitRules = $ipagClient->splitRules()->list($transactionId);
    // dd($responseSplitRules->getData());

    // Deletar
    // $responseSplitRules = $ipagClient->splitRules()->delete($splitRuleId, $transactionId);
    // dd($responseSplitRules->getData()['data']);

} catch (\Throwable $e) {
    echo $e->getMessage() . PHP_EOL;
}