<?php

require_once __DIR__ . '/..' . '/config.php';

$subscriptionPlan = new \Ipag\Sdk\Model\SubscriptionPlan(
    [
        'name' => 'PLANO SILVER',
        'description' => 'Plano Silver com até 2 treinos por semana',
        'amount' => 80,
        'frequency' => Ipag\Sdk\Core\Enums\Interval::MONTHLY,
        'interval' => 1,
        'cycles' => 0,
        'best_day' => true,
        'pro_rated_charge' => true,
        'grace_period' => 0,
        'callback_url' => 'https://ipag-sdk.requestcatcher.com/callback',
        'trial' => [
            'amount' => 0,
            'cycles' => 0
        ]
    ]
);

$subscriptionPlanId = 21;

try {

    $responseSubscriptionPlan = $ipagClient->subscriptionPlan()->update($subscriptionPlan, $subscriptionPlanId);
    $data = $responseSubscriptionPlan->getData();

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