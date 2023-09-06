<?php

namespace Ipag\Sdk\Mock;

use Ipag\Sdk\Core\Client;
use Ipag\Sdk\Core\IpagClient;
use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Http\Client\BaseHttpClient;
use Ipag\Sdk\Http\Client\GuzzleHttpClient;
use Ipag\Sdk\IO\JsonSerializer;

final class IpagClientMock extends IpagClient
{
    public function __construct(string $apiID, string $apiKey, string $environment, string $version = '2', ?array $configGuzzle = [])
    {
        Client::__construct(
            new IpagEnvironment($environment),
            new GuzzleHttpClient(
                array_merge(
                    [
                        'headers' => [
                            'Authorization' => 'Basic ' . base64_encode("{$apiID}:{$apiKey}"),
                            'Content-Type' => 'application/json',
                            'x-api-version' => $version,
                        ],
                    ],
                    $configGuzzle
                )
            ),
            new JsonSerializer()
        );
    }

    public function getHttpClient(): BaseHttpClient
    {
        return $this->httpClient;
    }

}