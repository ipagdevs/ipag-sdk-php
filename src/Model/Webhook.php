<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Webhook Class
 *
 * Classe responsável por representar o recurso Webhook.
 *
 */
final class Webhook extends Model
{
    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->enum('http_method', ['POST', 'PUT'])->nullable();
        $schema->string('url')->nullable();
        $schema->string('description')->nullable();
        $schema->any('actions')->nullable();

        return $schema->build();
    }

    protected function actions(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value($value)->array() ? $value :
                $ctx->raise('inválido (informe um array de actions de webhook)')
            )
        );
    }

    public function getHttpMethod(): ?string
    {
        return $this->get('http_method');
    }

    public function setHttpMethod(?string $httpMethod = null): self
    {
        $this->set('http_method', $httpMethod);
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->get('url');
    }

    public function setUrl(?string $url = null): self
    {
        $this->set('url', $url);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    public function setDescription(?string $description = null): self
    {
        $this->set('description', $description);
        return $this;
    }

    public function getActions(): ?array
    {
        return $this->get('actions');
    }

    public function setActions(?array $actions = null): self
    {
        $this->set('actions', $actions);
        return $this;
    }

}