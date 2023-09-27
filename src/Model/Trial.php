<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

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
     *  + [`'cycles'`] float (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->float('amount')->nullable();
        $schema->float('cycles')->nullable();

        return $schema->build();
    }

    protected function amount(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value
            : (
                is_numeric($value) && floatval($value) >= 0 ? (float) $value :
                $ctx->raise('inválido')
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

    protected function cycles(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value
            : (
                is_numeric($value) && floatval($value) >= 0 ? (float) $value :
                $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade cycles.
     *
     * @return float|null
     */
    public function getCycles(): ?float
    {
        return $this->get('cycles');
    }

    /**
     * Seta o valor da propriedade cycles.
     *
     * @param float|null $cycles
     * @return Trial
     */
    public function setCycles(?float $cycles): Trial
    {
        $this->set('cycles', $cycles);
        return $this;
    }

}