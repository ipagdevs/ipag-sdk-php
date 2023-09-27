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
    /**
     *  @param array $data
     *  array de dados do Split Rules.
     *
     *  + [`'receiver_id'`] string.
     *  + [`'amount'`] float.
     *  + [`'percentage'`] float.
     *  + [`'charge_processing_fee'`] bool.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('receiver_id')->nullable();
        $schema->string('receiver')->nullable();
        $schema->float('amount')->nullable();
        $schema->float('percentage')->nullable();
        $schema->bool('charge_processing_fee')->nullable();

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

    /**
     * Retorna o valor da propriedade receiver_id.
     *
     * @return string|null
     */
    public function getReceiverId(): ?string
    {
        return $this->get('receiver_id');
    }

    /**
     * Seta o valor da propriedade receiver_id.
     *
     * @param string|null $receiverId
     * @return self
     */
    public function setReceiverId(?string $receiverId = null): self
    {
        $this->set('receiver_id', $receiverId);
        $this->set('receiver', $receiverId);

        return $this;
    }

    /**
     * Retorna o valor da propriedade amount.
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    /**
     * Seta o valor da propriedade amount.
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
     * Retorna o valor da propriedade percentage.
     *
     * @return float|null
     */
    public function getPercentage(): ?float
    {
        return $this->get('percentage');
    }

    /**
     * Seta o valor da propriedade percentage.
     *
     * @param float|null $percentage
     * @return self
     */
    public function setPercentage(?float $percentage = null): self
    {
        $this->set('percentage', $percentage);
        return $this;
    }

    /**
     * Retorna o valor da propriedade charge_processing_fee.
     *
     * @return boolean|null
     */
    public function getChargeProcessingFee(): ?bool
    {
        return $this->get('charge_processing_fee');
    }

    /**
     * Seta o valor da propriedade charge_processing_fee.
     *
     * @param boolean|null $chargeProcessingFee
     * @return self
     */
    public function setChargeProcessingFee(?bool $chargeProcessingFee = null): self
    {
        $this->set('charge_processing_fee', $chargeProcessingFee);
        return $this;
    }

}