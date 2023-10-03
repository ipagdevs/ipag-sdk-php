<?php

namespace Ipag\Sdk\Core;

use Ipag\Sdk\Exception\HttpClientException;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\IO\SerializerInterface;
use Ipag\Sdk\Path\CompositePathInterface;
use Ipag\Sdk\Util\ArrayUtil;
use Ipag\Sdk\Util\PathUtil;

abstract class Endpoint implements CompositePathInterface
{
    protected Client $client;
    protected CompositePathInterface $parent;
    protected ?SerializerInterface $serializer;
    protected string $location;

    public function __construct(Client $client, CompositePathInterface $parent, ?string $location = null, ?SerializerInterface $serializer = null)
    {
        $this->client = $client;
        $this->parent = $parent;
        $this->location = $this->location ?? $location;
        $this->serializer = $serializer;
    }

    //

    protected function _GET(array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, null, $query, $header, $relativeUrl);
    }

    protected function _POST($body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, $body, $query, $header, $relativeUrl);
    }

    protected function _PUT($body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, $body, $query, $header, $relativeUrl);
    }

    protected function _PATCH($body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, $body, $query, $header, $relativeUrl);
    }

    protected function _DELETE(array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, null, $query, $header, $relativeUrl);
    }

    protected function _HEAD(array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, null, $query, $header, $relativeUrl);
    }

    //

    protected function request(string $method, $body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        try {
            return $this->client->request(
                strtoupper(substr($method, 1)),
                $relativeUrl ? $this->joinPath($relativeUrl) : $this->getPath(),
                $body,
                $query,
                $header,
                $this->serializer
            );
        } catch (HttpClientException $e) {

            $responseMessage = $this->sanitizeErrorMessage($e->getResponse());

            $this->exceptionThrown(
                new HttpClientException(
                    'response message: ' . json_encode($responseMessage) . " (status code: {$e->getCode()})",
                    $e->getCode(),
                    $e,
                    $e->getResponse()
                )
            );

        } catch (\Throwable $th) {
            $this->exceptionThrown($th);
        }
    }

    //

    public function getParent(): ?CompositePathInterface
    {
        return $this->parent;
    }

    public function setParent(?CompositePathInterface $parent): void
    {
        $this->parent = $parent;
    }

    public function getPath(): string
    {
        return $this->getParent()->joinPath($this->location);
    }

    public function joinPath(string $relative): string
    {
        return implode(PathUtil::PATH_SEPARATOR, [$this->getPath(), ltrim($relative, PathUtil::PATH_SEPARATOR)]);
    }

    //

    public static function make(Client $client, CompositePathInterface $parent, ?string $location = null, ?SerializerInterface $serializer = null)
    {
        return new static($client, $parent, $location, $serializer);
    }

    protected function exceptionThrown(\Throwable $e): void
    {
        throw $e;
    }

    private function sanitizeErrorMessage(Response $response): ?string
    {
        $responseMessage = $response->getParsedPath('message');

        if (is_array($responseMessage))
            $responseMessage = implode(' | ', ArrayUtil::extractStrings($responseMessage));

        $responseData = $response->getParsedPath('data');

        if (is_array($responseData))
            $responseMessage .= implode(' | ', ArrayUtil::extractStrings($responseData));

        $responseData = $response->getParsedPath('error');

        if (is_array($responseData))
            $responseMessage .= implode(' | ', ArrayUtil::extractStrings($responseData));

        return $responseMessage;
    }

}