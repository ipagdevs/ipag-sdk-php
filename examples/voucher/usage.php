<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$voucher = new \Ipag\Sdk\Model\Voucher([
    'order' => [
        'order_id' => '100018',
        'amount' => 699.99,
        'created_at' => '2020-08-04 21:45:10',
        'callback_url' => 'https://www.yahoo.com.br/callback'
    ],
    'seller' => [
        'cpf_cnpj' => '854.508.440-42',
    ],
    'customer' => [
        'name' => 'FULANO DA SILVA',
        'cpf_cnpj' => '949.373.210-05',
        'email' => 'fulano@mail.me',
        'phone' => '(11) 99780-1000',
        'birthdate' => '1990-10-10',
        'address' => [
            'street' => 'Av. Brasil',
            'number' => '1000',
            'district' => 'Centro',
            'complement' => 'Ap 451',
            'city' => 'São Paulo',
            'state' => 'SP'
        ]
    ]
]);

try {

    // Create
    $responseVoucher = $ipagClient->voucher()->create($voucher);
    dd($responseVoucher->getData());

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}