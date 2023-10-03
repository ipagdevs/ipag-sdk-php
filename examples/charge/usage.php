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

$charge = new \Ipag\Sdk\Model\Charge([
    'amount' => 160.50,
    'description' => 'Cobrança referente a negociação de débito pendente na Empresa X',
    'due_date' => '2020-10-30',
    'frequency' => 1,
    'interval' => 'month',
    'type' => 'charge',
    'last_charge_date' => '2020-10-30',
    'callback_url' => 'https://api.ipag.test/retorno_charge',
    'auto_debit' => false,
    'installments' => 12,
    'is_active' => true,
    'products' => [2],
    'customer' => [
        'name' => 'Maria Francisca',
    ],
    'checkout_settings' => [
        'max_installments' => 12,
    ]
]);

try {

    $chargeId = 1;

    // Create
    $responseCharge = $ipagClient->charge()->create(new \Ipag\Sdk\Model\Charge);
    dd($responseCharge->getData());

    // Update
    // $responseCharge = $ipagClient->charge()->update($charge, $chargeId);
    // dd($responseCharge->getData());

    // Get
    // $responseCharge = $ipagClient->charge()->get($chargeId);
    // dd($responseCharge->getData());

    // List
    // $responseCharge = $ipagClient->charge()->list([
    //     'is_active' => false,
    // ]);
    // dd($responseCharge->getData());

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}