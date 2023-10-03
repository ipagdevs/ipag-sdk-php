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
    /**
     *  @param array $data
     *  array de dados do Checkout.
     *
     *  + [`'seller_id'`] string.
     *  + [`'expires_in'`] int.
     *
     *  + [`'customer'`] array (opcional) dos dados do Customer.
     *  + &emsp; [`'name'`] string.
     *  + &emsp; [`'tax_receipt'`] string.
     *  + &emsp; [`'email'`] string.
     *  + &emsp; [`'phone'`] string.
     *  + &emsp; [`'birthdate'`] string.
     *  + &emsp; [`'address'`] array (opcional) dos dados do Address.
     *  + &emsp;&emsp; [`'street'`] string (opcional).
     *  + &emsp;&emsp; [`'number'`] string (opcional).
     *  + &emsp;&emsp; [`'district'`] string (opcional).
     *  + &emsp;&emsp; [`'city'`] string (opcional).
     *  + &emsp;&emsp; [`'state'`] string (opcional).
     *  + &emsp;&emsp; [`'zipcode'`] string (opcional).
     *
     *  + [`'installment_setting'`] array (opcional) dos dados do Installment Setting.
     *  + &emsp; [`'max_installments'`] int.
     *  + &emsp; [`'min_installment_value'`] float.
     *  + &emsp; [`'interest'`] float.
     *  + &emsp; [`'interest_free_installments'`] int.
     *
     *  + [`'order'`] array (opcional) dos dados do Order.
     *  + &emsp; [`'order_id'`] string.
     *  + &emsp; [`'amount'`] float.
     *  + &emsp; [`'return_url'`] string.
     *  + &emsp; [`'return_type'`] string.
     *
     *  + [`'products'`] Product[] (opcional) dos dados do Product.
     *  + &emsp; [
     *  + &emsp;&emsp; [`'name'`] string
     *  + &emsp;&emsp; [`'unit_price'`] string
     *  + &emsp;&emsp; [`'quantity'`] int
     *  + &emsp;&emsp; [`'sku'`] string
     *  + &emsp;&emsp; [`'description'`] string
     *  + &emsp; ], [`...`]
     *
     *  + [`'split_rules'`] SplitRules[] (opcional) dos dados do Split Rules.
     *  + &emsp; [
     *  + &emsp;&emsp; [`'receiver_id'`] string.
     *  + &emsp;&emsp; [`'amount'`] float.
     *  + &emsp;&emsp; [`'percentage'`] float.
     *  + &emsp;&emsp; [`'charge_processing_fee'`] bool.
     *  + &emsp;&emsp; [`'seller_id'`] string.
     *  + &emsp;&emsp; [`'liable'`] bool.
     *  + &emsp;&emsp; [`'hold_receivables'`] bool.
     *  + &emsp; ], [`...`]
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('seller_id')->nullable();
        $schema->int('expires_in')->nullable();
        $schema->has('customer', Customer::class)->nullable();
        $schema->has('installment_setting', InstallmentSetting::class)->nullable();
        $schema->has('order', Order::class)->nullable();
        $schema->hasMany('products', Product::class)->default([])->nullable();
        $schema->hasMany('split_rules', SplitRules::class)->default([])->nullable();

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
            [
                ...$this->get('products'),
                $product
            ]
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
            [
                ...$this->get('split_rules'),
                $splitRule
            ]
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