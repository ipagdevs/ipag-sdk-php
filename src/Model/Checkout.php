<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Checkout Class
 *
 * Classe responsável por representar o recurso Checkout.
 *
 */
final class Checkout extends Model
{
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->has('customer', Customer::class)->nullable();
        $schema->has('installment_setting', InstallmentSetting::class)->nullable();
        $schema->has('order', Order::class)->nullable();
        $schema->hasMany('products', Product::class)->default([])->nullable();
        $schema->hasMany('split_rules', SplitRules::class)->default([])->nullable();
        $schema->string('seller_id')->nullable();
        $schema->int('expires_in')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o objeto `Customer` vinculado ao `Checkout`.
     *
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->get('customer');
    }

    /**
     * Seta o objeto `Customer` vinculado ao `Checkout`.
     *
     * @param Customer|null $customer
     * @return self
     */
    public function setCustomer(?Customer $customer = null): self
    {
        $this->set('customer', $customer);
        return $this;
    }

    /**
     * Retorna o objeto `InstallmentSetting` vinculado ao `Checkout`.
     *
     * @return InstallmentSetting|null
     */
    public function getInstallmentSetting(): ?InstallmentSetting
    {
        return $this->get('installment_setting');
    }

    /**
     * Seta o objeto `InstallmentSetting` vinculado ao `Checkout`.
     *
     * @param InstallmentSetting|null $installmentSetting
     * @return self
     */
    public function setInstallmentSetting(?InstallmentSetting $installmentSetting = null): self
    {
        $this->set('installment_setting', $installmentSetting);
        return $this;
    }

    /**
     * Retorna o objeto `Order` vinculado ao `Checkout`.
     *
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->get('order');
    }

    /**
     * Seta o objeto `Order` vinculado ao `Checkout`.
     *
     * @param Order|null $order
     * @return self
     */
    public function setOrder(?Order $order = null): self
    {
        $this->set('order', $order);
        return $this;
    }

    /**
     * Retorna os produtos vinculados ao `Checkout`.
     *
     * @return array|null
     */
    public function getProducts(): ?array
    {
        return $this->get('products');
    }

    /**
     * Seta os produtos vinculados ao `Checkout`.
     *
     * @param array $products
     * @return self
     */
    public function setProducts(array $products = []): self
    {
        $this->set('products', $products);
        return $this;
    }

    /**
     * Adiciona um produto ao `Checkout`.
     *
     * @param Product $product
     * @return self
     */
    public function addProduct(Product $product): self
    {
        $this->set(
            'products',
            array_merge(
                $this->get('products'),
                [
                    $product
                ]
            )
        );

        return $this;
    }

    /**
     * Retorna as regras de split vinculados ao `Checkout`.
     *
     * @return array|null
     */
    public function getSplitRules(): ?array
    {
        return $this->get('split_rules');
    }

    /**
     * Seta as regras vinculados ao `Checkout`.
     *
     * @param array $splitRules
     * @return self
     */
    public function setSplitRules(array $splitRules = []): self
    {
        $this->set('split_rules', $splitRules);
        return $this;
    }

    /**
     * Adiciona uma regra de split ao `Checkout`.
     *
     * @param SplitRules $splitRule
     * @return self
     */
    public function addSplitRule(SplitRules $splitRule): self
    {
        $this->set(
            'split_rules',
            array_merge(
                $this->get('split_rules'),
                [
                    $splitRule
                ]
            )
        );

        return $this;
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
     * Retorna o valor da propriedade `expires_in`.
     *
     * @return integer|null
     */
    public function getExpiresIn(): ?int
    {
        return $this->get('expires_in');
    }

    /**
     * Seta o valor da propriedade `expires_in`.
     *
     * @param integer|null $expiresIn
     * @return self
     */
    public function setExpiresIn(?int $expiresIn = null): self
    {
        $this->set('expires_in', $expiresIn);
        return $this;
    }

}