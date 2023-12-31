<?php

require_once __DIR__ . '/..' . '/config.php';

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        'amount' => 10000,
        'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
        'payment' => [
            'type' => Ipag\Sdk\Core\Enums\PaymentTypes::CARD,
            'method' => Ipag\Sdk\Core\Enums\Cards::VISA,
            'installments' => 1,
            'capture' => false,
            'softdescriptor' => 'BRUCE ENTER',
            'fraud_analysis' => true,
            'card' => [
                'holder' => 'Bruce Wayne',
                'number' => '4111 1111 1111 1111',
                'expiry_month' => '01',
                'expiry_year' => '2025',
                'cvv' => '123'
            ]
        ],
        'customer' => [
            'name' => 'Bruce Wayne',
            'email' => 'brucewayne@email.com',
            'cpf_cnpj' => '490.558.550-30',
            'phone' => '(22) 2222-33333',
            'business_name' => 'Wayne Enterprises',
            'birthdate' => '1987-02-19',
            'ip' => '192.168.0.1',
            'billing_address' => [
                'street' => 'Avenida Principal',
                'number' => '12345',
                "complement" => "Sala 02",
                'district' => 'São Paulo',
                'city' => 'São Paulo',
                'state' => 'SP',
                'zipcode' => '01310-000'
            ]
        ],
        'products' => [
            [
                'name' => 'Smart TV LG 55 4K UHD',
                'unit_price' => 5000,
                'quantity' => 1,
                'sku' => 'LG123',
                'description' => 'Experiência cristalina em 4K.'
            ],
            [
                'name' => 'LED Android TV 4K UHD LED',
                'unit_price' => 5000,
                'quantity' => 1,
                'sku' => 'SAM123',
                'description' => 'Android TV de 126 cm (50).'
            ],
        ]
    ]
);

try {

    $responsePayment = $ipagClient->payment()->create($paymentTransaction);
    $data = $responsePayment->getData();

    $statusPayment = $responsePayment->getParsedPath('attributes.status.code');
    $statusGateway = $responsePayment->getParsedPath('attributes.gateway.code');
    $statusAcquirer = $responsePayment->getParsedPath('attributes.acquirer.code');

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

    echo "Status do Pagamento retornado: {$statusPayment}" . PHP_EOL;
    echo "Status da Gateway: {$statusGateway}" . PHP_EOL;
    echo "Status da Adquirente: {$statusAcquirer}" . PHP_EOL;

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