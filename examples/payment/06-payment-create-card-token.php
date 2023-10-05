<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'wayne1',
    'D3F8-E3D981DF-C2766F07-9AC79BD7-A729',
    IpagEnvironment::LOCAL,
);

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        'amount' => 100,
        'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
        'payment' => [
            'type' => Ipag\Sdk\Core\Enums\PaymentTypes::CARD,
            'installments' => 2,
            'card' => [
                'token' => '552af952-e189-45d5-b974-e5bb87385e01'
            ]
        ],
        'customer' => [
            'name' => 'Bruce Wayne',
            'cpf_cnpj' => '490.558.550-30',
        ]
    ]
);

try {

    $responsePayment = $ipagClient->payment()->create($paymentTransaction);
    $data = $responsePayment->getData();

    $statusPayment = $responsePayment->getParsedPath('attributes.status.code');
    $statusGateway = $responsePayment->getParsedPath('attributes.gateway.code');
    $statusAcquirer = $responsePayment->getParsedPath('attributes.acquirer.code');

    echo "Status do Pagamento retornado: {$statusPayment}" . PHP_EOL;
    echo "Status da Gateway: {$statusGateway}" . PHP_EOL;
    echo "Status da Adquirente: {$statusAcquirer}" . PHP_EOL;

    echo "<pre>" . PHP_EOL;
    print_r($data);
    echo "</pre>" . PHP_EOL;

    // Verifica o status retornado do pagamento
    switch ($statusPayment) {
        case Ipag\Sdk\Core\Enums\PaymentStatus::CAPTURED:
        case Ipag\Sdk\Core\Enums\PaymentStatus::PRE_AUTHORIZED:
            // Faça algo aqui...
            break;
        default:
        // Faça algo aqui...
    }

    // Verifica o status retornado do gateway de pagamento
    switch ($statusGateway) {
        case Ipag\Sdk\Core\Enums\GatewayStatus::SUCCEED:
            // Faça algo aqui...
            break;
        default:
        // Faça algo aqui...
    }

    // Verifica o status retornado da Adquirente de pagamento
    switch ($statusAcquirer) {
        case Ipag\Sdk\Core\Enums\AcquirerStatus::APPROVED_OR_COMPLETED_SUCCESSFULLY:
            // Faça algo aqui...
            break;
        default:
        // Faça algo aqui...
    }

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