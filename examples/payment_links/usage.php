<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$paymentLink = new \Ipag\Sdk\Model\PaymentLink([
    'external_code' => '133',
    'amount' => 0,
    'description' => 'LINK DE PAGAMENTO SUPER BACANA',
    'expireAt' => '2020-12-30 23:00:00',
    'buttons' => [
        'enable' => false,
        'one' => 0,
        'two' => 0,
        'three' => 0
    ],
    'checkout_settings' => [
        'max_installments' => 12,
        'interest_free_installments' => 12,
        'min_installment_value' => 0.00,
        'interest' => 0.00,
        'payment_method' => 'all'
    ],
]);

try {

    $paymentLink_id = 2;

    $external_code = 130;

    // Create
    // $responsePaymentLink = $ipagClient->paymentLinks()->create($paymentLink);
    // dd($responsePaymentLink->getData());

    // Get Id
    // $responsePaymentLink = $ipagClient->paymentLinks()->getById($paymentLink_id);
    // dd($responsePaymentLink->getData());

    // Get External Code
    // $responsePaymentLink = $ipagClient->paymentLinks()->getByExternalCode($external_code);
    // dd($responsePaymentLink->getData());

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}