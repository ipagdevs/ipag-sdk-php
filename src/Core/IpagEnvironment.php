<?php

namespace Ipag\Sdk\Core;

final class IpagEnvironment extends Environment
{
    public const VERSION = '2';
    public const LOCAL = 'api.ipag.test';
    public const PRODUCTION = 'https://api.ipag.com.br';
    public const SANDBOX = 'https://sandbox.ipag.com.br';

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

}