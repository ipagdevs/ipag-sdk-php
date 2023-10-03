<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;

$ipagClient = new IpagClient(
    'apiID',
    'apiKey',
    IpagEnvironment::SANDBOX
);

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
    [
        "amount" => 85,
        "callback_url" => "https://99mystore.com.br/ipag/callback",
        "order_id" => "1234567",
        "payment" => [
            "type" => "card",
            "method" => IpagEnvironment::cardMethods()::VISA,
            "installments" => 1,
            "capture" => false,
            "fraud_analysis" => true,
            "card" => [
                "holder" => "ARTHUR MORGAN",
                "number" => "4111 1111 1111 1111",
                "expiry_month" => "01",
                "expiry_year" => "2025",
                "cvv" => "123"
            ]
        ],
        "customer" => [
            "name" => "Arthur Morgan",
            "cpf_cnpj" => "972.089.620-57"
        ],
        "event" => [
            "name" => "Reveillon - 2022",
            "date" => "2022-01-01 00:00:00",
            "type" => "party",
            "subtype" => "Reveillon",
            "venue" => [
                "name" => "Campo - Clube das Laranjeiras",
                "capacity" => 2000,
                "address" => "Av. Santos Dumont",
                "city" => "São Paulo",
                "state" => "SP"
            ],
            "tickets" => [
                [
                    "id" => "EVENT001",
                    "category" => "regular",
                    "premium" => false,
                    "section" => "Pista",
                    "attendee" => [
                        "document" => "972.089.620-57",
                        "dob" => "1990-10-28"
                    ]
                ],
                [
                    "id" => "EVENT002",
                    "category" => "regular",
                    "premium" => true,
                    "section" => "Camarote",
                    "attendee" => [
                        "document" => "444.631.330-41",
                        "dob" => "1992-03-28"
                    ]
                ]
            ]
        ]
    ]
);

try {

    // Create
    // $responsePayment = $ipagClient->payment()->create($paymentTransaction);
    // dd($responsePayment->getData());

} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}