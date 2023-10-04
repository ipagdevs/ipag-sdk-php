<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
  'apiID',
  'apiKey',
  IpagEnvironment::SANDBOX
);

$paymentTransaction = new \Ipag\Sdk\Model\PaymentTransaction(
  [
    "amount" => 99.0,
    "callback_url" => "https://ipag-sdk.requestcatcher.com/callback",
    "payment" => [
      "type" => "card",
      "method" => Ipag\Sdk\Core\Enums\Cards::VISA,
      "installments" => 1,
      "capture" => true,
      "card" => [
        "holder" => "FULANO DA SILVA",
        "number" => "4111 1111 1111 1111",
        "expiry_month" => "03",
        "expiry_year" => "2021",
        "cvv" => "123"
      ]
    ],
    "customer" => [
      "name" => "Fulano da Silva",
      "cpf_cnpj" => "79999338801",
      "ip" => "192.168.0.1",
      "billing_address" => [
        "street" => "Rua Júlio Gonzalez",
        "number" => "1023",
        "district" => "Barra Funda",
        "complement" => "Sala 02",
        "city" => "São Paulo",
        "state" => "SP",
        "zipcode" => "01156-060"
      ]
    ],
    "split_rules" => [
      [
        "seller_id" => "vendedor1@mail.me",
        "amount" => 15.87,
        "liable" => true
      ],
      [
        "seller_id" => "vendedor2@mail.me",
        "percentage" => 20.0,
        "liable" => true,
        "charge_processing_fee" => false
      ]
    ]
  ]
);

try {

  // Create
  // $responsePayment = $ipagClient->payment()->create($paymentTransaction);
  // dd($responsePayment->getData());

} catch (HttpException $e) {
  dd($e->getResponse()->getData());
  // dd($e->getResponse()->getHeaders());
  // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}