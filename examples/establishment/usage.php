<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpClientException;

$ipagClient = new IpagClient('lucas', 'E089-31668545-5BB2521F-72F14DB1-283C', IpagEnvironment::LOCAL);

$establishment = new \Ipag\Sdk\Model\Establishment([
    'name' => 'Lívia Julia Eduarda Barros',
    'email' => 'livia.julia.barros@eximiart.com.br',
    'login' => 'livia',
    'password' => 'livia123',
    'document' => '074.598.263-83',
    'phone' => '(98) 3792-4834',
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

try {

    $establishment_id = 1;

    //TODO: Pedir para liberar esses recursos na minha conta local do Ipag

    // Create
    $responseEstablishment = $ipagClient->establishment()->create($establishment);
    dd($responseEstablishment);

    // Update
    // $responseEstablishment = $ipagClient->establishment()->update($establishment, $establishment_id);
    // dd($responseEstablishment);

    // Get
    // $responseEstablishment = $ipagClient->establishment()->get($establishment_id);
    // dd($responseEstablishment);

    // List
    // $responseEstablishment = $ipagClient->establishment()->list();
    // dd($responseEstablishment);

    //TODO: Fazer os endpoints de transações dos estabelecimento
    // $ipagClient->establishment()->transaction()->

} catch (HttpClientException $e) {
    echo $e->getMessage() . PHP_EOL;
}