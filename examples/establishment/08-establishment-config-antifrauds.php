<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

$ipagClient = new Ipag\Sdk\Core\IpagClient(
    'apiID',
    'apiKey',
    Ipag\Sdk\Core\IpagEnvironment::SANDBOX,
);

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

$establishmentUuid = 'bb36c34eb6644ab9694315af7d68e629';

try {

    $responseConfig = $ipagClient
        ->establishment()
        ->antifraud()
        ->config($antifraud, $establishmentUuid);
    $data = $responseConfig->getData();

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