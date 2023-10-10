<?php

require_once __DIR__ . '/..' . '/config.php';

$transactionId = 139;

try {

    $responseTransaction = $ipagClient->transaction()->get($transactionId);
    $data = $responseTransaction->getData();

    $statusPayment = $responseTransaction->getParsedPath('attributes.status.code');

    // Verifica o status retornado do pagamento
    switch ($statusPayment) {
        case Ipag\Sdk\Core\Enums\PaymentStatus::CAPTURED:
        case Ipag\Sdk\Core\Enums\PaymentStatus::PRE_AUTHORIZED:
            // Faça algo aqui...
            break;
        default:
        // Faça algo aqui...
    }

    echo "Status do Pagamento: {$statusPayment}" . PHP_EOL;

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