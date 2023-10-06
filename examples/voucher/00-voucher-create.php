<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX,
);

$voucher = new \Ipag\Sdk\Model\Voucher(
    [
        'order' => [
            'order_id' => '128',
            'amount' => 100,
            'created_at' => '2023-10-13 21:45:10',
            'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback'
        ],
        'seller' => [
            'cpf_cnpj' => '168.853.290-02'
        ],
        'customer' => [
            'name' => 'Bruce Wayne',
            'email' => 'brucewayne@email.com',
            'cpf_cnpj' => '490.558.550-30',
            'phone' => '(22) 2222-33333',
            'business_name' => 'Wayne Enterprises',
            'birthdate' => '1987-02-19',
            'address' => [
                'street' => 'Avenida Principal',
                'number' => '12345',
                'complement' => 'Sala 02',
                'district' => 'São Paulo',
                'city' => 'São Paulo',
                'state' => 'SP',
                'zipcode' => '01310-000'
            ]
        ]
    ]
);

try {

    $responseVoucher = $ipagClient->voucher()->create($voucher);
    $data = $responseVoucher->getData();

    $statusPayment = $responseVoucher->getParsedPath('attributes.status.code');

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