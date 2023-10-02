<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Trial Class
 *
 * Classe responsável por representar o recurso Trial.
 */
class Trial extends Model
{
    /**
     *  @param array $data
     *  array de dados do Trial.
     *
     *  + [`'amount'`] float (opcional).
     *  + [`'cycles'`] int (opcional).
     *  + [`'frequency'`] int (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->float('amount')->nullable();
        $schema->int('cycles')->nullable();
        $schema->int('frequency')->nullable();

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

    protected function cycles(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gte(0)->get()
                ?? $ctx->raise('inválido (informe um valor de 0 à 120)')
            )
        );
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

    /**
     * Retorna o valor da propriedade amount.
     *
     * @param float|null $amount
     * @return Trial
     */
    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    /**
     * Seta o valor da propriedade amount.
     *
     * @param float|null $amount
     * @return Trial
     */
    public function setAmount(?float $amount = null): Trial
    {
        $this->set('amount', $amount);
        return $this;
    }

    /**
     * Retorna o valor da propriedade cycles.
     *
     * @return int|null
     */
    public function getCycles(): ?int
    {
        return $this->get('cycles');
    }

    /**
     * Seta o valor da propriedade cycles.
     *
     * @param int|null $cycles
     * @return Trial
     */
    public function setCycles(?int $cycles): Trial
    {
        $this->set('cycles', $cycles);
        return $this;
    }

    /**
     * Retorna o valor da propriedade frequency.
     *
     * @return integer|null
     */
    public function getFrequency(): ?int
    {
        return $this->get('frequency');
    }

    /**
     * Seta o valor da propriedade frequency.
     *
     * @param integer|null $frequency
     * @return Trial
     */
    public function setFrequency(?int $frequency = null): Trial
    {
        $this->set('frequency', $frequency);
        return $this;
    }

}