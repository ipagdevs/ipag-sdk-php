<?php

namespace Ipag\Sdk\Core;

final class IpagEnvironment extends Environment
{
    public const VERSION = '2';
    public const LOCAL = 'api.ipag.test';
    public const PRODUCTION = 'https://api.ipag.com.br';
    public const SANDBOX = 'https://sandbox.ipag.com.br';
    private static ?IpagEnvironmentWebhook $envWebhook = null;
    private static ?IpagEnvironmentPaymentMethodsAcquirer $envMethod = null;
    private static ?IpagEnvironmentCardMethods $envCardMethods = null;
    private static ?IpagEnvironmentBankSlipMethods $envBankSlipMethods = null;
    private static ?IpagEnvironmentOtherMethods $envOtherMethods = null;

    private string $serviceUrl;

    public function __construct(string $environment)
    {

        if (!$this->isValidEnv($environment))
            throw new \UnexpectedValueException("The environment must be valid");

        parent::__construct($environment);
    }

    private function isValidEnv(string $value)
    {
        return $value === self::LOCAL || $value === self::SANDBOX || $value === self::PRODUCTION;
    }

    public static function webhook(): IpagEnvironmentWebhook
    {
        if (!self::$envWebhook)
            self::$envWebhook = new IpagEnvironmentWebhook;

        return self::$envWebhook;
    }

    public static function paymentMethodsAcquirer(): IpagEnvironmentPaymentMethodsAcquirer
    {
        if (!self::$envMethod)
            self::$envMethod = new IpagEnvironmentPaymentMethodsAcquirer;

        return self::$envMethod;
    }

    public static function cardMethods(): IpagEnvironmentCardMethods
    {
        if (!self::$envCardMethods)
            self::$envCardMethods = new IpagEnvironmentCardMethods;

        return self::$envCardMethods;
    }

    public static function bankSlipMethods(): IpagEnvironmentBankSlipMethods
    {
        if (!self::$envBankSlipMethods)
            self::$envBankSlipMethods = new IpagEnvironmentBankSlipMethods;

        return self::$envBankSlipMethods;
    }

    public static function otherPaymentMethods(): IpagEnvironmentOtherMethods
    {
        if (!self::$envOtherMethods)
            self::$envOtherMethods = new IpagEnvironmentOtherMethods;

        return self::$envOtherMethods;
    }

}