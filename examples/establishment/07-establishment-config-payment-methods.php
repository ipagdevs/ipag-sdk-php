<?php

require_once __DIR__ . '/..' . '/..' . '/vendor/autoload.php';

use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Exception\HttpException;

$ipagClient = new IpagClient(
    'master',
    'FC92-2F86859F-225B4C88-3FFEA3CA-6CE5',
    IpagEnvironment::LOCAL,
);

$paymentMethod = new \Ipag\Sdk\Model\PaymentMethod([
    'acquirer' => Ipag\Sdk\Core\Enums\Acquirer::STONE,
    'priority' => 100,
    'environment' => 'test',
    'capture' => true,
    'retry' => true,
    'credentials' =>
        (
            (new Ipag\Sdk\Support\Credentials\PaymentMethods\StoneCredentials())
                ->setStoneCode('xxxxx')
                ->setStoneSak('xxxxxx')
        )->jsonSerialize(),
]);

$establishmentUuid = 'bb36c34eb6644ab9694315af7d68e629';

try {

    $responseConfig = $ipagClient
        ->establishment()
        ->paymentMethods()
        ->config($paymentMethod, $establishmentUuid);
    $data = $responseConfig->getData();

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
    var_dump($code, $errors);
    echo "</pre>" . PHP_EOL;

}