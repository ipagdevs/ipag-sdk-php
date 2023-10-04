<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;
use Ipag\Sdk\Support\Credentials\PaymentMethods\StoneCredentials;

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
    'acquirer' => IpagEnvironment::paymentMethodsAcquirer()::STONE,
    'priority' => 100,
    'environment' => 'test',
    'capture' => true,
    'retry' => true,
    'credentials' =>
        (
            (new StoneCredentials())
                ->setStoneCode('xxxxx')
                ->setStoneSak('xxxxxx')
        )->jsonSerialize(),
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

    $establishmentTid = 'bb36c34eb6644ab9694315af7d68e629';
    $transactionTid = '33e75ff09dd601bbe69f351039152189';

    // Create
    $responseEstablishment = $ipagClient->establishment()->create($establishment);
    dd($responseEstablishment->getData());

    // Update
    // $responseEstablishment = $ipagClient->establishment()->update($establishment, $establishmentTid);
    // dd($responseEstablishment->getData());

    // Get
    // $responseEstablishment = $ipagClient->establishment()->get($establishmentTid);
    // dd($responseEstablishment->getData());

    // List
    // $responseEstablishment = $ipagClient->establishment()->list();
    // dd($responseEstablishment->getData());

    //** Transactions **//

    // List All Establishment Transactions
    // $responseTransactions = $ipagClient->establishment()->transaction()->list();
    // dd($responseTransactions->getData());

    // List Transactions By Establishment
    // $responseTransactions = $ipagClient->establishment()->transaction()->listByEstablishment($establishmentTid);
    // dd($responseTransactions->getData());

    // Get Transaction By Establishment
    // $responseTransactions = $ipagClient->establishment()->transaction()->getByEstablishment($establishmentTid, $transactionTid);
    // dd($responseTransactions->getData());

    /** Configs */

    // Configurar Métodos de Pagamento

    // $responseConfig = $ipagClient
    //     ->establishment()
    //     ->paymentMethods()
    //     ->config($paymentMethod, $establishmentTid);
    // dd($responseConfig->getData());

    //FIXME: Não funciona
    // Configurar Antifraudes

    // $responseConfig = $ipagClient
    //     ->establishment()
    //     ->antifraud()
    //     ->config($antifraud, $establishmentTid);
    // dd($responseConfig);

} catch (HttpException $e) {
    dd($e->getResponse()->getData());
    // dd($e->getResponse()->getHeaders());
    // dd($e->getResponse()->getStatusCode());
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}