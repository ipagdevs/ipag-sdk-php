<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * PaymentSplitRules Class
 *
 * Classe responsável por representar o recurso Payment Split Rules.
 */
class PaymentSplitRules extends Model
{
    /**
     *  @param array $data
     *  array de dados do Split Rules.
     *
     *  + [`'seller_id'`] string.
     *  + [`'amount'`] float.
     *  + [`'percentage'`] float.
     *  + [`'liable'`] bool.
     *  + [`'charge_processing_fee'`] bool.
     *  + [`'hold_receivables'`] bool.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('seller_id')->nullable();
        $schema->float('percentage')->nullable();
        $schema->float('amount')->nullable();
        $schema->bool('liable')->nullable();
        $schema->bool('charge_processing_fee')->nullable();
        $schema->bool('hold_receivables')->nullable();

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
     * Retorna o valor da propriedade `seller_id`.
     *
     * @return string|null
     */
    public function getSellerId(): ?string
    {
        return $this->get('seller_id');
    }

    /**
     * Seta o valor da propriedade `seller_id`.
     *
     * @param string|null $sellerId
     * @return self
     */
    public function setSellerId(?string $sellerId = null): self
    {
        $this->set('seller_id', $sellerId);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `percentage`.
     *
     * @return float|null
     */
    public function getPercentage(): ?float
    {
        return $this->get('percentage');
    }

    /**
     * Seta o valor da propriedade `percentage`.
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
     * Retorna o valor da propriedade `amount`.
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->get('amount');

    }

    /**
     * Seta o valor da propriedade `amount`.
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
     * Retorna o valor da propriedade `liable`.
     *
     * @return boolean|null
     */
    public function getLiable(): ?bool
    {
        return $this->get('liable');
    }

    /**
     * Seta o valor da propriedade `liable`.
     *
     * @param boolean|null $liable
     * @return self
     */
    public function setLiable(?bool $liable = null): self
    {
        $this->set('liable', $liable);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `charge_processing_fee`.
     *
     * @return boolean|null
     */
    public function getChargeProcessingFee(): ?bool
    {
        return $this->get('charge_processing_fee');
    }

    /**
     * Seta o valor da propriedade `charge_processing_fee`.
     *
     * @param boolean|null $chargeProcessingFee
     * @return self
     */
    public function setChargeProcessingFee(?bool $chargeProcessingFee = null): self
    {
        $this->set('charge_processing_fee', $chargeProcessingFee);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `hold_receivables`.
     *
     * @return boolean|null
     */
    public function getHoldReceivables(): ?bool
    {
        return $this->get('hold_receivables');
    }

    /**
     * Seta o valor da propriedade `hold_receivables`.
     *
     * @param boolean|null $holdReceivables
     * @return self
     */
    public function setHoldReceivables(?bool $holdReceivables = null): self
    {
        $this->set('hold_receivables', $holdReceivables);
        return $this;
    }

}