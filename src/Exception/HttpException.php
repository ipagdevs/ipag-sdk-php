<?php

namespace Ipag\Sdk\Exception;

use Ipag\Sdk\Http\Response;
use Throwable;

abstract class HttpException extends BaseException
{
    protected ?Response $response;
    protected ?int $statusCode;
    protected ?string $statusMessage;
    protected ?array $errors;

    public function __construct(
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
        ?Response $response = null,
        ?int $statusCode = null,
        ?string $statusMessage = null,
        ?array $errors = []
    ) {
        parent::__construct($message, $code, $previous);

        $this->response = $response;
        $this->statusCode = $statusCode;
        $this->statusMessage = $statusMessage;
        $this->errors = $errors;
    }

    public function getResponse(): ?Response
    {
        return $this->response;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function getStatusMessage(): ?string
    {
        return $this->statusMessage;
    }

    public function getErrors(): ?array
    {
        return $this->errors;
    }
}