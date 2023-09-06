<?php

namespace Ipag\Sdk\Core;

use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Endpoint\CustomerEndpoint;
use Ipag\Sdk\Http\Client\GuzzleHttpClient;
use Ipag\Sdk\IO\JsonSerializer;

/**
 * IpagClient Class
 *
 * Classe principal do SDK. Responsável por instanciar os endpoint da API do IPag.
 */
class IpagClient extends Client
{

    public function IpagClient()
    {
    }

    /**
     * @param string $apiID API ID é a identificação do usuário.
     * @param string $apiKey API Key é a chave de acesso do usuário.
     * @param string Ambiente de execução (IpagEnvironment::SANDBOX | IpagEnvironment::PRODUCTION).
     * @param string $version Versão da API (valor padrão = '2').
     */
    public function __construct(string $apiID, string $apiKey, string $environment, string $version = '2')
    {
        parent::__construct(
            new IpagEnvironment($environment),
            new GuzzleHttpClient(
                [
                    'headers' => [
                        'Authorization' => 'Basic ' . base64_encode("{$apiID}:{$apiKey}"),
                        'Content-Type' => 'application/json',
                        'x-api-version' => $version,
                    ],
                ]
            ),
            new JsonSerializer()
        );
    }

    public function customer(): CustomerEndpoint
    {
        return CustomerEndpoint::make($this, $this);
    }

    /*
    public function payment(): PaymentEndpoint
    {
        return PaymentEndpoint::create($this, $this);
    }
    */

}