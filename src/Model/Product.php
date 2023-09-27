<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Product Class
 *
 * Classe responsável por representar o recurso Product.
 *
 */
final class Product extends Model
{
    /**
     *  @param array $data
     *  array de dados do Product.
     *
     *  + [`'name'`] string.
     *  + [`'unit_price'`] float.
     *  + [`'quantity'`] int.
     *  + [`'sku'`] string.
     *  + [`'description'`] string.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('name')->nullable();
        $schema->float('unit_price')->nullable();
        $schema->int('quantity')->nullable();
        $schema->string('sku')->nullable();
        $schema->string('description')->nullable();

        return $schema->build();
    }

    protected function unit_price(): Mutator
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

    protected function quantity(): Mutator
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
     * Retorna o valor da propriedade `name`.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * Seta o valor da propriedade `name`.
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
     * Retorna o valor da propriedade `unit_price`.
     *
     * @return float|null
     */
    public function getUnitPrice(): ?float
    {
        return $this->get('unit_price');
    }

    /**
     * Seta o valor da propriedade `unit_price`.
     *
     * @param float|null $unit_price
     * @return self
     */
    public function setUnitPrice(?float $unit_price = null): self
    {
        $this->set('unit_price', $unit_price);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `quantity`.
     *
     * @return integer|null
     */
    public function getQuantity(): ?int
    {
        return $this->get('quantity');
    }

    /**
     * Seta o valor da propriedade `quantity`.
     *
     * @param integer|null $quantity
     * @return self
     */
    public function setQuantity(?int $quantity = null): self
    {
        $this->set('quantity', $quantity);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `sku`.
     *
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->get('sku');
    }

    /**
     * Seta o valor da propriedade `sku`.
     *
     * @param string|null $sku
     * @return self
     */
    public function setSku(?string $sku = null): self
    {
        $this->set('sku', $sku);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `description`.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    /**
     * Seta o valor da propriedade `description`.
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description = null): self
    {
        $this->set('description', $description);
        return $this;
    }

}