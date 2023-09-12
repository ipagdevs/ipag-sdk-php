<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Address Class
 *
 * Classe responsável por representar o recurso Subscription Plan.
 */
class SubscriptionPlan extends Model
{
    /**
     *  @param array $data
     *  array de dados do Trial.
     *
     *  + ['name'] string.
     *  + ['description'] string.
     *  + ['amount'] float.
     *  + ['frequency'] string.
     *  + ['interval'] int (opcional).
     *  + ['cycles'] float (opcional).
     *  + ['callback_url'] string (opcional).
     *  +
     *  + ['trial'] array (opcional) dos dados do Trial.
     *      + ['trial']['amount'] float (opcional).
     *      + ['trial']['cycles'] float (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('name')->nullable();
        $schema->string('description')->nullable();
        $schema->float('amount')->nullable();
        $schema->string('frequency')->nullable();
        $schema->int('interval')->nullable();
        $schema->float('cycles')->nullable();
        $schema->string('callback_url')->nullable();
        $schema->has('trial', Trial::class)->nullable();

        $schema->bool('best_day')->nullable();
        $schema->bool('pro_rated_charge')->nullable();
        $schema->int('grace_period')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * Seta o valor da propriedade name
     *
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name = null): self
    {
        $this->set('name', $name);
        return $this;
    }

    /**
     * Retorna o valor da propriedade description
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    /**
     * Seta o valor da propriedade description
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description = null): self
    {
        $this->set('description', $description);
        return $this;
    }

    protected function amount(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value
            : (
                (settype($value, 'float')) &&
                $value >= 0 ? $value :
                $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade amount
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    /**
     * Seta o valor da propriedade amount
     *
     * @param float|null $amount
     * @return self
     */
    public function setAmount(?float $amount = null): self
    {
        $this->set('amount', $amount);
        return $this;
    }

    protected function frequency(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ||
            $value === 'monthly' ||
            $value === 'weekly' ||
            $value === 'daily' ?
            $value : $ctx->raise('inválido')
        );
    }

    /**
     * Retorna o valor da propriedade frequency
     *
     * @return string|null
     */
    public function getFrequency(): ?string
    {
        return $this->get('frequency');
    }

    /**
     * Seta o valor da propriedade frequency
     *
     * @param string|null $frequency
     * @return self
     */
    public function setFrequency(?string $frequency = null): self
    {
        $this->set('frequency', $frequency);
        return $this;
    }

    protected function interval(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                (settype($value, 'int')) &&
                $value >= 1 && $value <= 12 ? $value :
                $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade interval
     *
     * @return integer|null
     */
    public function getInterval(): ?int
    {
        return $this->get('interval');
    }

    /**
     * Seta o valor da propriedade interval
     *
     * @param integer|null $interval
     * @return self
     */
    public function setInterval(?int $interval = null): self
    {
        $this->set('interval', $interval);
        return $this;
    }

    protected function cycles(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                floatval($value) >= 0 ? $value :
                $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade cycles
     *
     * @return integer|null
     */
    public function getCycles(): ?int
    {
        return $this->get('cycles');
    }

    /**
     * Seta o valor da propriedade cycles
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
     * Retorna o valor da propriedade callback_url
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->get('callback_url');
    }

    /**
     * Seta o valor da propriedade callback_url
     *
     * @param string|null $callbackUrl
     * @return self
     */
    public function setCallbackUrl(?string $callbackUrl = null): self
    {
        $this->set('callback_url', $callbackUrl);
        return $this;
    }

    /**
     * Retorna o objeto da propriedade Trial
     *
     * @return Trial|null
     */
    public function getTrial(): ?Trial
    {
        return $this->get('trial');
    }

    /**
     * Seta o objeto da propriedade Trial
     *
     * @param Trial|null $trial
     * @return self
     */
    public function setTrial(?Trial $trial = null): self
    {
        $this->set('trial', $trial);
        return $this;
    }

    /**
     * Retorna o valor da propriedade best_day
     *
     * @return boolean|null
     */
    public function getBestDay(): ?bool
    {
        return $this->get('best_day');
    }

    /**
     * Seta o valor da propriedade best_day
     *
     * @param boolean|null $bestDay
     * @return self
     */
    public function setBestDay(?bool $bestDay = null): self
    {
        $this->set('best_day', $bestDay);
        return $this;
    }

    /**
     * Retorna o valor da propriedade pro_rated_charge
     *
     * @return boolean|null
     */
    public function getProRatedCharge(): ?bool
    {
        return $this->get('pro_rated_charge');
    }

    /**
     * Seta o valor da propriedade pro_rated_charge
     *
     * @param boolean|null $proRatedCharge
     * @return self
     */
    public function setProRatedCharge(?bool $proRatedCharge = null): self
    {
        $this->set('pro_rated_charge', $proRatedCharge);
        return $this;
    }

    /**
     * Retorna o valor da propriedade grace_period
     *
     * @return integer|null
     */
    public function getGracePeriod(): ?int
    {
        return $this->get('grace_period');
    }

    /**
     * Seta o valor da propriedade grace_period
     *
     * @param integer|null $gracePeriod
     * @return self
     */
    public function setGracePeriod(?int $gracePeriod = null): self
    {
        $this->set('grace_period', $gracePeriod);
        return $this;
    }

}