<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Order Class
 *
 * Classe responsável por representar o recurso Order.
 */
class Order extends Model
{
    /**
     *  @param array $data
     *  array de dados do Order.
     *
     *  + [`'order_id'`] string.
     *  + [`'amount'`] float.
     *  + [`'created_at'`] string.
     *  + [`'callback_url'`] string.
     *  + [`'return_url'`] string.
     *  + [`'return_type'`] string.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('order_id')->nullable();
        $schema->float('amount')->nullable();
        $schema->string('created_at')->nullable();
        $schema->string('callback_url')->nullable();
        $schema->string('return_url')->nullable();
        $schema->string('return_type')->nullable();

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

    /**
     * Retorna o valor da propriedade `order_id`.
     *
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->get('order_id');
    }

    /**
     * Seta o valor da propriedade `order_id`.
     *
     * @param string|null $orderId
     * @return self
     */
    public function setOrderId(?string $orderId = null): self
    {
        $this->set('order_id', $orderId);
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
     * Retorna o valor da propriedade `created_at`.
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->get('created_at');
    }

    /**
     * Seta o valor da propriedade `created_at`.
     *
     * @param string|null $createdAt
     * @return self
     */
    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->set('created_at', $createdAt);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `callback_url`.
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->get('callback_url');
    }

    /**
     * Seta o valor da propriedade `callback_url`.
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
     * Retorna o valor da propriedade `return_url`.
     *
     * @return string|null
     */
    public function getReturnUrl(): ?string
    {
        return $this->get('return_url');
    }

    /**
     * Seta o valor da propriedade `return_url`.
     *
     * @param string|null $returnUrl
     * @return self
     */
    public function setReturnUrl(?string $returnUrl = null): self
    {
        $this->set('return_url', $returnUrl);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `return_type`.
     *
     * @return string|null
     */
    public function getReturnType(): ?string
    {
        return $this->get('return_type');
    }

    /**
     * Seta o valor da propriedade `return_type`.
     *
     * @param string|null $returnType
     * @return self
     */
    public function setReturnType(?string $returnType = null): self
    {
        $this->set('return_type', $returnType);
        return $this;
    }

}