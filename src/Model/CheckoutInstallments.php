<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

final class CheckoutInstallments extends Model
{
    /**
     *  @param array $data
     *  array de dados do CheckoutInstallments.
     *
     *  + [`'amount'`] float (opcional).
     *  + [`'max_installment'`] int (opcional).
     *  + [`'installments_without_interest'`] int (opcional).
     *  + [`'installment_min_amount'`] float (opcional).
     *  + [`'installment_tax'`] float (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->float('amount')->nullable();
        $schema->int('max_installment')->nullable();
        $schema->int('installments_without_interest')->nullable();
        $schema->float('installment_min_amount')->nullable();
        $schema->float('installment_tax')->nullable();

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

    protected function max_installment(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gte(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    protected function installments_without_interest(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gte(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    protected function installment_min_amount(): Mutator
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

    protected function installment_tax(): Mutator
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

    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    public function setAmount(?float $amount = null): self
    {
        $this->set('amount', $amount);
        return $this;
    }

    public function getMaxInstallment(): ?int
    {
        return $this->get('max_installment');
    }

    public function setMaxInstallment(?int $max_installment = null): self
    {
        $this->set('max_installment', $max_installment);
        return $this;
    }

    public function getInstallmentsWithoutInterest(): ?int
    {
        return $this->get('installments_without_interest');
    }

    public function setInstallmentsWithoutInterest(?int $installments_without_interest = null): self
    {
        $this->set('installments_without_interest', $installments_without_interest);
        return $this;
    }

    public function getInstallmentMinAmount(): ?float
    {
        return $this->get('installment_min_amount');
    }

    public function setInstallmentMinAmount(?float $installment_min_amount = null): self
    {
        $this->set('installment_min_amount', $installment_min_amount);
        return $this;
    }

    public function getInstallmentTax(): ?float
    {
        return $this->get('installment_tax');
    }

    public function setInstallmentTax(?float $installment_tax = null): self
    {
        $this->set('installment_tax', $installment_tax);
        return $this;
    }
}