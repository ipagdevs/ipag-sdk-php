<?php

namespace Ipag\Sdk\Core;

use JsonSerializable;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\IO\SerializerInterface;
use Ipag\Sdk\Path\CompositePathInterface;
use Ipag\Sdk\Util\PathUtil;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

abstract class Endpoint implements CompositePathInterface
{
    protected Client $client;
    protected CompositePathInterface $parent;
    protected ?SerializerInterface $serializer;
    protected string $location;

    protected ?object $resource;

    protected ?LoggerInterface $logger;

    public function __construct(Client $client, CompositePathInterface $parent, ?string $location = null, ?SerializerInterface $serializer = null, ?object $resource = null, ?LoggerInterface $logger = null)
    {
        $this->client = $client;
        $this->parent = $parent;
        $this->location = $this->location ?? $location;
        $this->serializer = $serializer;
        $this->resource = $resource;
        $this->logger = $logger ?? new NullLogger();
    }

    //

    protected function requestGET(array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, null, $query, $header, $relativeUrl);
    }

    protected function requestPOST($body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, $body, $query, $header, $relativeUrl);
    }

    protected function requestPUT($body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, $body, $query, $header, $relativeUrl);
    }

    protected function requestPATCH($body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, $body, $query, $header, $relativeUrl);
    }

    protected function requestDELETE(array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, null, $query, $header, $relativeUrl);
    }

    protected function requestHEAD(array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->request(__FUNCTION__, null, $query, $header, $relativeUrl);
    }

    //

    protected function request(string $method, $body, array $query = [], array $header = [], ?string $relativeUrl = null): Response
    {
        return $this->client->request(
            strtoupper(trim(str_replace("request", "", $method))),
            $relativeUrl ? $this->joinPath($relativeUrl) : $this->getPath(),
            $body,
            $query,
            $header,
            $this->serializer
        );
    }

    //

    public function getResource(): object
    {
        return $this->resource;
    }

    public function setResource(object $resource): self
    {
        $this->resource = $resource;
        return $this;
    }

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

    public static function make(Client $client, CompositePathInterface $parent, ?string $location = null, ?SerializerInterface $serializer = null, ?object $resource = null)
    {
        return new static($client, $parent, $location, $serializer, $resource);
    }

    protected function exceptionThrown(\Throwable $e): void
    {
        throw $e;
    }

}