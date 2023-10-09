<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

$ipagClient = new Ipag\Sdk\Core\IpagClient(
    'apiID',
    'apiKey',
    Ipag\Sdk\Core\Ipag\Sdk\Core\IpagEnvironment::SANDBOX,
);

$charge = new \Ipag\Sdk\Model\Charge([
    'amount' => 100,
    'description' => 'Cobrança referente a negociação de débito pendente na Empresa X',
    'due_date' => '2020-10-30',
    'frequency' => 1,
    'interval' => 'month',
    'type' => 'charge',
    'last_charge_date' => '2020-10-30',
    'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
    'auto_debit' => false,
    'installments' => 12,
    'is_active' => true,
    'products' => [2],
    'customer' => [
        'name' => 'Arthur Morgan',
    ],
    'checkout_settings' => [
        'max_installments' => 12,
    ]
]);

try {

    $responseCharge = $ipagClient->charge()->create($charge);
    $data = $responseCharge->getData();

    echo "<pre>" . PHP_EOL;
    print_r($data);
    echo "</pre>" . PHP_EOL;

} catch (Ipag\Sdk\Exception\HttpException $e) {
    $code = $e->getResponse()->getStatusCode();
    $errors = $e->getErrors();

    echo "<pre>" . PHP_EOL;
    var_dump($code, $errors);
    echo "</pre>" . PHP_EOL;

} catch (Exception $e) {
    $error = $e->getMessage();

    echo "<pre>" . PHP_EOL;
    var_dump($error);
    echo "</pre>" . PHP_EOL;

}