<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$ipagClient = new IpagClient('master', '88E1-CFD86E49-A4351D43-C694871D-F3C0', IpagEnvironment::LOCAL);

$establishment = new \Ipag\Sdk\Model\Establishment([
    'name' => 'Estabelecimento de teste',
    'email' => 'teste@estabteste.com.br',
    'login' => 'estabteste',
    'password' => 'estabteste',
    'document' => '452.262.530-87',
    'phone' => '(62) 98901-4380',
    'is_active' => true,
    'address' =>
        [
            'street' => 'Rua A',
        ],
    'owner' => [
        'name' => 'Lívia Julia Eduarda Barros',
    ],
    'bank' => [
        'code' => '001'
    ]
]);

$paymentMethod = new \Ipag\Sdk\Model\PaymentMethod([
    'acquirer' => 'stone',
    'priority' => 100,
    'environment' => 'test',
    'capture' => true,
    'retry' => true,
    'credentials' => [
        'stone_code' => 'xxxxx',
        'stone_sak' => 'xxxxxx'
    ],
]);

$antifraud = new \Ipag\Sdk\Model\Antifraud(
    [
        "provider" => (
            new Ipag\Sdk\Support\Provider\Antifraudes\RedShieldProvider([
            "token" => "xxxxxxxx",
            "entityId" => "xxxxxxxx",
            "channelId" => "xxxxxxxx",
            "serviceId" => "xxxxxxxx"
            ])
        )->jsonSerialize(),
        "settings" => [
            "enable" => true,
            "environment" => "test",
            "consult_mode" => "auto",
            "capture_on_approval" => false,
            "cancel_on_refused" => true,
            "review_score_threshold" => 0.8
        ]
    ]
);

try {

    $establishment_tid = 'bb36c34eb6644ab9694315af7d68e629';
    $transaction_tid = '33e75ff09dd601bbe69f351039152189';

    // Create
    // $responseEstablishment = $ipagClient->establishment()->create(new \Ipag\Sdk\Model\Establishment);
    // dd($responseEstablishment->getData());

    // Update
    // $responseEstablishment = $ipagClient->establishment()->update($establishment, $establishment_tid);
    // dd($responseEstablishment->getData());

    // Get
    // $responseEstablishment = $ipagClient->establishment()->get($establishment_tid);
    // dd($responseEstablishment->getData());

    // List
    // $responseEstablishment = $ipagClient->establishment()->list();
    // dd($responseEstablishment->getData());

    //** Transactions **//

    // List All Establishment Transactions
    // $responseTransactions = $ipagClient->establishment()->transaction()->list();
    // dd($responseTransactions->getData());

    // List Transactions By Establishment
    // $responseTransactions = $ipagClient->establishment()->transaction()->listByEstablishment($establishment_tid);
    // dd($responseTransactions->getData());

    // Get Transaction By Establishment
    // $responseTransactions = $ipagClient->establishment()->transaction()->getByEstablishment($establishment_tid, $transaction_tid);
    // dd($responseTransactions->getData());

    /** Configs */

    // Configurar Métodos de Pagamento

    // $responseConfig = $ipagClient
    //     ->establishment()
    //     ->paymentMethods()
    //     ->config($paymentMethod, $establishment_tid);
    // dd($responseConfig->getData());

    //FIXME: Não funciona
    // Configurar Antifraudes

    // $responseConfig = $ipagClient
    //     ->establishment()
    //     ->antifraud()
    //     ->config($antifraud, $establishment_tid);
    // dd($responseConfig);

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
    // dd($e);
}