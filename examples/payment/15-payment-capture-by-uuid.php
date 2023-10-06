<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'wayne1',
    'D3F8-E3D981DF-C2766F07-9AC79BD7-A729',
    IpagEnvironment::LOCAL,
);

try {

    $transactionUuid = '4c56ff4ce4aaf9573aa5dff913df997a';

    $responsePayment = $ipagClient->payment()->captureByUuid($transactionUuid);
    $data = $responsePayment->getData();

    $statusPayment = $responsePayment->getParsedPath('attributes.status.code');

    // Verifica o status retornado do pagamento
    switch ($statusPayment) {
        case Ipag\Sdk\Core\Enums\PaymentStatus::CAPTURED:
            // Faça algo aqui...
            break;
        default:
        // Faça algo aqui...
    }

    echo "Status do Pagamento: {$statusPayment}" . PHP_EOL;

    echo "<pre>" . PHP_EOL;
    print_r($data);
    echo "</pre>" . PHP_EOL;

} catch (HttpException $e) {
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