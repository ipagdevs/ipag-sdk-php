<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * CheckoutSettings Class
 *
 * Classe responsável por representar o recurso Checkout Settings.
 *
 */
final class CheckoutSettings extends Model
{

    /**
     *  @param array $data
     *  array de dados do CheckoutSettings.
     *
     *  + [`'max_installments'`] int (opcional).
     *  + [`'interest_free_installments'`] int (opcional).
     *  + [`'min_installment_value'`] float (opcional).
     *  + [`'interest'`] float (opcional).
     *  + [`'fixed_installment'`] float (opcional).
     *  + [`'payment_method'`] enum {`'all'` | `'creditcard'` | `'boleto'` | `'transfer'` | `'pix'`} (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->int('max_installments')->nullable();
        $schema->int('interest_free_installments')->nullable();
        $schema->float('min_installment_value')->nullable();
        $schema->float('interest')->nullable();
        $schema->float('fixed_installment')->nullable();
        $schema->enum('payment_method', [
            'all',
            'creditcard',
            'boleto',
            'transfer',
            'pix'
        ])->nullable();

        return $schema->build();
    }

    protected function max_installments(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gt(0)->get()
                ?? $ctx->raise('inválido (informe um valor de 1 à 12)')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `max_installments`.
     *
     * @return integer|null
     */
    public function getMaxInstallments(): ?int
    {
        return $this->get('max_installments');
    }

    /**
     * Seta o valor da propriedade `max_installments`.
     *
     * @param integer|null $maxInstallments
     * @return self
     */
    public function setMaxInstallments(?int $maxInstallments = null): self
    {
        $this->set('max_installments', $maxInstallments);
        return $this;
    }

    protected function interest_free_installments(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gt(0)->get()
                ?? $ctx->raise('inválido (informe um valor de 1 à 12)')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `interest_free_installments`.
     *
     * @return integer|null
     */
    public function getInterestFreeInstallments(): ?int
    {
        return $this->get('interest_free_installments');
    }

    /**
     * Seta o valor da propriedade `interest_free_installments`.
     *
     * @param integer|null $interestFreeInstallments
     * @return self
     */
    public function setInterestFreeInstallments(?int $interestFreeInstallments = null): self
    {
        $this->set('interest_free_installments', $interestFreeInstallments);
        return $this;
    }

    protected function min_installment_value(): Mutator
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

    /**
     * Retorna o valor da propriedade `min_installment_value`.
     *
     * @return float|null
     */
    public function getMinInstallmentValue(): ?float
    {
        return $this->get('min_installment_value');
    }

    /**
     * Seta o valor da propriedade `min_installment_value`.
     *
     * @param float|null $minInstallmentValue
     * @return self
     */
    public function setMinInstallmentValue(?float $minInstallmentValue = null): self
    {
        $this->set('min_installment_value', $minInstallmentValue);
        return $this;
    }

    protected function interest(): Mutator
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

    /**
     * Retorna o valor da propriedade `interest`.
     *
     * @return float|null
     */
    public function getInterest(): ?float
    {
        return $this->get('interest');
    }

    /**
     * Seta o valor da propriedade `interest`.
     *
     * @param float|null $interest
     * @return self
     */
    public function setInterest(?float $interest = null): self
    {
        $this->set('interest', $interest);
        return $this;
    }

    protected function fixed_installment(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                // Assert::value($value)->between(1, 12)->get()
                Assert::value(floatval($value))->gte(0)->get()
                ?? $ctx->raise('inválido (informe um valor de 1 à 12)')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `fixed_installment`.
     *
     * @return float|null
     */
    public function getFixedInstallment(): ?float
    {
        return $this->get('fixed_installment');
    }

    /**
     * Seta o valor da propriedade `fixed_installment`.
     *
     * @param float|null $fixedInstallment
     * @return self
     */
    public function setFixedInstallment(?float $fixedInstallment = null): self
    {
        $this->set('fixed_installment', $fixedInstallment);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `payment_method`.
     *
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->get('payment_method');
    }

    /**
     * Seta o valor da propriedade `payment_method`.
     *
     * @param string|null $paymentMethod
     * @return self
     */
    public function setPaymentMethod(?string $paymentMethod = null): self
    {
        $this->set('payment_method', $paymentMethod);
        return $this;
    }

}