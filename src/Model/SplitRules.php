<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * SplitRules Class
 *
 * Classe responsável por representar o recurso Split Rules.
 */
class SplitRules extends Model
{
    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('receiver_id')->nullable();
        $schema->float('amount')->nullable();
        $schema->float('percentage')->nullable();

        return $schema->build();
    }

    protected function amount(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(floatval($value))->gte(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    protected function percentage(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(floatval($value))->gte(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    public function getReceiverId(): ?string
    {
        return $this->get('receiver_id');
    }

    public function setReceiverId(?string $receiverId = null): self
    {
        $this->set('receiver_id', $receiverId);
        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    public function setAmount(?float $amount = null): self
    {
        $this->set('amount', $amount);
        return $this;
    }

    public function getPercentage(): ?float
    {
        return $this->get('percentage');
    }

    public function setPercentage(?float $percentage = null): self
    {
        $this->set('percentage', $percentage);
        return $this;
    }

}