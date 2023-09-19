<?php

namespace Ipag\Sdk\Core;

class IpagEnvironment extends Environment
{
    public const LOCAL = 'api.ipag.test';
    public const PRODUCTION = 'https://api.ipag.com.br';
    public const SANDBOX = 'https://sandbox.ipag.com.br';

    private static ?IpagEnvironmentWebhook $envWebhook = null;

    private string $serviceUrl;

    public function __construct(string $environment)
    {

        if (!$this->isValidEnv($environment))
            throw new \UnexpectedValueException("The environment must be valid");

        parent::__construct($environment);
        /*
        $this->url = $this->joinPath("/v{$auth}");
        */
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

}