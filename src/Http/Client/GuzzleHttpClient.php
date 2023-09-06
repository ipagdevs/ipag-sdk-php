<?php

namespace Ipag\Sdk\Http\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Exception\HttpServerException;
use Ipag\Sdk\Exception\HttpTransferException;
use Ipag\Sdk\Http\Response;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

class GuzzleHttpClient extends BaseHttpClient
{
    private const DEFAULT_USER_AGENT = 'Template SDK for PHP';

    protected Client $client;

    public function __construct(array $config = [])
    {
        static $default = [
            'allow_redirects' => false,
            'timeout' => 60.00,
            'connect_timeout' => 10.00,
            'http_errors' => true,
            'headers' => [
                'User-Agent' => self::DEFAULT_USER_AGENT
            ],
        ];

        $this->client = new Client(array_merge($default, $config));
    }

    /**
     * Uses the current http client wrapper to do a request.
     *
     * @throws RuntimeException
     * @throws HttpTransferException
     * @throws HttpClientException
     * @throws HttpServerException
     * 
     * @param string $method
     * @param string $url
     * @param string|null $body
     * @param array $query
     * @param array $header
     * @return string|null
     */
    public function request(string $method, string $url, ?string $body, array $query = [], array $header = []): ?string
    {
        try {
            $response = $this->client->request($method, $url, [
                'headers' => $header,
                'query' => $query,
                'body' => $body,
            ]);

            return $response->getBody()->getContents();
        } catch (ConnectException $e) {
            // Networking error
            throw new HttpTransferException("An networking error ocurred while trying to connect to `$url`", $e->getCode(), $e);
        } catch (ServerException $e) {
            // Server-side error 5xx
            throw new HttpServerException(
                "An server-side error ocurred with status {$e->getResponse()->getStatusCode()} from `$url`",
                $e->getCode(),
                $e,
                // If this fails, an RuntimeException will be thrown
                Response::from($e->getResponse()->getBody()->getContents()),
                $e->getResponse()->getStatusCode(),
                $e->getResponse()->getReasonPhrase()
            );
        } catch (ClientException $e) {
            // Client-side error 4xx
            throw new HttpClientException(
                "An client-side error ocurred with status {$e->getResponse()->getStatusCode()} from `$url`",
                $e->getCode(),
                $e,
                // If this fails, an RuntimeException will be thrown
                Response::from($e->getResponse()->getBody()->getContents()),
                $e->getResponse()->getStatusCode(),
                $e->getResponse()->getReasonPhrase()
            );
        } catch (RuntimeException $e) {
            // Stream error
            throw $e;
        }
    }
}
