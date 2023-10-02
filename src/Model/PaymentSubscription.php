<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * PaymentSubscription Class
 *
 * Classe responsável por representar o recurso Payment Subscription.
 */
class PaymentSubscription extends Model
{
    /**
     *  @param array $data
     *  array de dados do Payment Subscription.
     *
     *  + [`'frequency'`] int (opcional).
     *  + [`'interval'`] string (opcional).
     *  + [`'start_date'`] string (opcional).
     *  + [`'amount'`] float (opcional).
     *  + [`'installments'`] int (opcional).
     *  + [`'cycles'`] int (opcional).
     *
     *  + [`'trial'`] array (opcional) dos dados do Trial.
     *  + &emsp; [`'amount'`] float (opcional).
     *  + &emsp; [`'cycles'`] float (opcional).
     *  + &emsp; [`'frequency'`] int (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->int('frequency')->nullable(); // 1 ~ 12
        $schema->string('interval')->nullable(); // day, week, month
        $schema->string('start_date')->nullable(); //Y-m-d
        $schema->float('amount')->nullable();
        $schema->int('installments')->nullable();
        $schema->int('cycles')->nullable();

        $schema->has('trial', Trial::class)->nullable();

        return $schema->build();
    }

    protected function frequency(): Mutator
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

    protected function start_date(): Mutator
    {
        return new Mutator(
            null,
            function ($value, $ctx) {
                $d = \DateTime::createFromFormat('Y-m-d', $value);

                return is_null($value) ||
                    ($d && $d->format('Y-m-d') === $value) ?
                    $value : $ctx->raise('inválido');
            }
        );
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

    protected function installments(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gt(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    protected function cycles(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gt(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `frequency`
     *
     * @return integer|null
     */
    public function getFrequency(): ?int
    {
        return $this->get('frequency');
    }

    /**
     * Seta o valor da propriedade `frequency`
     *
     * @param integer|null $frequency
     * @return self
     */
    public function setFrequency(?int $frequency = null): self
    {
        $this->set('frequency', $frequency);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `interval`
     *
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->get('interval');
    }

    /**
     * Seta o valor da propriedade `interval`
     *
     * @param string|null $interval
     * @return self
     */
    public function setInterval(?string $interval = null): self
    {
        $this->set('interval', $interval);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `trial`
     *
     * @return string|null
     */
    public function getStartDate(): ?string
    {
        return $this->get('start_date');
    }

    /**
     * Seta o valor da propriedade `trial`
     *
     * @param string|null $startDate
     * @return self
     */
    public function setStartDate(?string $startDate = null): self
    {
        $this->set('start_date', $startDate);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `amount`
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    /**
     * Seta o valor da propriedade `amount`
     *
     * @param float|null $amount
     * @return self
     */
    public function setAmount(?float $amount = null): self
    {
        $this->set('amount', $amount);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `installments`
     *
     * @return integer|null
     */
    public function getInstallments(): ?int
    {
        return $this->get('installments');
    }

    /**
     * Seta o valor da propriedade `installments`
     *
     * @param integer|null $installments
     * @return self
     */
    public function setInstallments(?int $installments = null): self
    {
        $this->set('installments', $installments);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `cycles`
     *
     * @return integer|null
     */
    public function getCycles(): ?int
    {
        return $this->get('cycles');
    }

    /**
     * Seta o valor da propriedade `cycles`
     *
     * @param integer|null $cycles
     * @return self
     */
    public function setCycles(?int $cycles = null): self
    {
        $this->set('cycles', $cycles);
        return $this;
    }

    /**
     * Retorna o objeto `Trial` do `Subscription`.
     *
     * @return Trial|null
     */
    public function getTrial(): ?Trial
    {
        return $this->get('trial');
    }

    /**
     * Seta o objeto `Trial` do `Subscription`.
     *
     * @param Trial|null $trial
     * @return self
     */
    public function setTrial(?Trial $trial = null): self
    {
        $this->set('trial', $trial);
        return $this;
    }

}