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
    protected function created_at(): Mutator
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
    */

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

}