<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * InstallmentSetting Class
 *
 * Classe responsável por representar o recurso Installment Settings.
 *
 */
final class InstallmentSetting extends Model
{
    /**
     *  @param mixed[] $data
     *  array de dados do Split Rules.
     *
     *  + [`'max_installments'`] int.
     *  + [`'min_installment_value'`] float.
     *  + [`'interest'`] float.
     *  + [`'interest_free_installments'`] int.
     *  + [`'fixed_installment'`] int.
     *  + [`'payment_method'`] string.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->int('max_installments')->nullable(); // 1 ~ 12
        $schema->float('min_installment_value')->nullable();
        $schema->float('interest')->nullable();
        $schema->int('interest_free_installments')->nullable(); // 1 ~ 12
        $schema->int('fixed_installment')->nullable(); // 1 ~ 12
        $schema->string('payment_method')->nullable(); // all, creditcard, boleto, transfer, pix

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

    protected function fixed_installment(): Mutator
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
     * Retorna o valor da propriedade `maxInstallments`.
     *
     * @return integer|null
     */
    public function getMaxInstallments(): ?int
    {
        return $this->get('max_installments');
    }

    /**
     * Seta o valor da propriedade `maxInstallments`.
     *
     * @param integer|null $maxInstallments
     * @return self
     */
    public function setMaxInstallments(?int $maxInstallments = null): self
    {
        $this->set('max_installments', $maxInstallments);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `minInstallmentValue`.
     *
     * @return float|null
     */
    public function getMinInstallmentValue(): ?float
    {
        return $this->get('min_installment_value');
    }

    /**
     * Seta o valor da propriedade `minInstallmentValue`.
     *
     * @param float|null $minInstallmentValue
     * @return self
     */
    public function setMinInstallmentValue(?float $minInstallmentValue = null): self
    {
        $this->set('min_installment_value', $minInstallmentValue);
        return $this;
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

    /**
     * Retorna o valor da propriedade `interestFreeInstallments`.
     *
     * @return integer|null
     */
    public function getInterestFreeInstallments(): ?int
    {
        return $this->get('interest_free_installments');
    }

    /**
     * Seta o valor da propriedade `interestFreeInstallments`.
     *
     * @param integer|null $interestFreeInstallments
     * @return self
     */
    public function setInterestFreeInstallments(?int $interestFreeInstallments = null): self
    {
        $this->set('interest_free_installments', $interestFreeInstallments);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `fixedInstallment`.
     *
     * @return integer|null
     */
    public function getFixedInstallment(): ?int
    {
        return $this->get('fixed_installment');
    }

    /**
     * Seta o valor da propriedade `fixedInstallment`.
     *
     * @param integer|null $fixedInstallment
     * @return self
     */
    public function setFixedInstallment(?int $fixedInstallment = null): self
    {
        $this->set('fixed_installment', $fixedInstallment);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `paymentMethod`.
     *
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->get('payment_method');
    }

    /**
     * Seta o valor da propriedade `paymentMethod`.
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