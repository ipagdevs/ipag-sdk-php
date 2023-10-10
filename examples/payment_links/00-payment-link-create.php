<?php

require_once __DIR__ . '/..' . '/config.php';

$paymentLink = new \Ipag\Sdk\Model\PaymentLink([
    'externalCode' => '150',
    'amount' => 0,
    'description' => 'Link para doação',
    'expireAt' => '2023-12-30 23:00:00',
    'buttons' => [
        'enable' => true,
        'one' => 5,
        'two' => 10,
        'three' => 15
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

    $responsePaymentLink = $ipagClient->paymentLinks()->create($paymentLink);
    $data = $responsePaymentLink->getData();

    $link = $responsePaymentLink->getParsedPath('links.payment');

    echo "Link de Pagamento: {$link}" . PHP_EOL;

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