<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Voucher Class
 *
 * Classe responsável por representar o recurso Voucher.
 */
class Voucher extends Model
{

    /**
     *  @param array $data
     *  array de dados do Voucher.
     *
     *  + [`'order'`] array (opcional) dos dados do Order.
     *  + &emsp; [`'order_id'`] string.
     *  + &emsp; [`'amount'`] float.
     *  + &emsp; [`'created_at'`] string.
     *  + &emsp; [`'callback_url'`] string.
     *
     *  + [`'seller'`] array (opcional) dos dados do Seller.
     *  + &emsp; [`'cpf_cnpj'`] string (opcional).
     *
     *  + [`'customer'`] array (opcional) dos dados do Customer.
     *  + &emsp; [`'name'`] string.
     *  + &emsp; [`'email'`] string (opcional).
     *  + &emsp; [`'phone'`] string (opcional).
     *  + &emsp; [`'cpf_cnpj'`] string (opcional).
     *  + &emsp; [`'birthdate'`] string (opcional) {`Formato: Y-m-d`}.
     *  + &emsp; [`'address'`] array (opcional) dos dados do Address.
     *  + &emsp;&emsp; [`'street'`] string (opcional).
     *  + &emsp;&emsp; [`'number'`] string (opcional).
     *  + &emsp;&emsp; [`'district'`] string (opcional).
     *  + &emsp;&emsp; [`'city'`] string (opcional).
     *  + &emsp;&emsp; [`'state'`] string (opcional).
     *  + &emsp;&emsp; [`'zipcode'`] string (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->has('order', Order::class)->nullable();
        $schema->has('seller', Seller::class)->nullable();
        $schema->has('customer', Customer::class)->nullable();

        return $schema->build();
    }

    /**
     * Retorna o objeto `Order` associado ao `Voucher`.
     *
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->get('order');
    }

    /**
     * Seta o objeto `Order` associado ao `Voucher`.
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
     * Retorna o objeto `Seller` associado ao `Voucher`.
     *
     * @return Seller|null
     */
    public function getSeller(): ?Seller
    {
        return $this->get('seller');
    }

    /**
     * Seta o objeto `Seller` associado ao `Voucher`.
     *
     * @param Seller|null $seller
     * @return self
     */
    public function setSeller(?Seller $seller = null): self
    {
        $this->set('seller', $seller);
        return $this;
    }

    /**
     * Retorna o objeto `Customer` associado ao `Voucher`.
     *
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->get('customer');
    }

    /**
     * Seta o objeto `Customer` associado ao `Voucher`.
     *
     * @param Customer|null $customer
     * @return self
     */
    public function setCustomer(?Customer $customer = null): self
    {
        $this->set('customer', $customer);
        return $this;
    }

}