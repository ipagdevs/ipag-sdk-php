<?php

namespace Ipag\Sdk\Http;

use Ipag\Sdk\IO\JsonSerializer;
use Ipag\Sdk\IO\MutatorInterface;
use Ipag\Sdk\IO\SerializerInterface;
use Ipag\Sdk\Util\ArrayUtil;

class Response
{
    protected ?SerializerInterface $serializer;
    protected ?array $data;
    protected ?string $raw;

    protected ?array $headers;

    protected ?int $statusCode;

    protected function __construct(?SerializerInterface $serializer, ?string $body, ?array $headers, ?int $statusCode)
    {
        $this->raw = $body;
        $this->serializer = $serializer;
        $this->data = null;
        $this->headers = $headers;
        $this->statusCode = $statusCode;
    }

    public function unSerialize(): self
    {
        if (empty($this->raw) || gettype(json_decode($this->raw)) === 'string')
            $this->data = null;
        else
            $this->data = $this->serializer ? $this->serializer->unserialize($this->raw) : null;

        return $this;
    }

    public function getParsed(): ?array
    {
        $this->unSerialize();

        return [
            'data' => $this->data,
            'headers' => $this->headers,
            'statusCode' => $this->statusCode
        ];
    }

    public function getParsedPath(string $dotNotation, $default = null)
    {
        return ArrayUtil::get('data.' . $dotNotation, $this->getParsed(), $default);
    }

    public function getBody(): ?string
    {
        return $this->raw;
    }

    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setSerializer(?SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }

    //

    public static function from(?string $data, ?array $headers = null, ?int $statusCode = null): self
    {
        return new static(null, $data, $headers, $statusCode);
    }
}