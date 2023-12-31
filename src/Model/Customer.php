<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Customer Class
 *
 * Classe responsável por representar o recurso Customer.
 *
 * @see https://developers.ipag.com.br/pt-br/customer?id=overview Recurso Customer da API Ipag
 */
final class Customer extends Model
{
    /**
     *  @param array $data
     *  array de dados do Customer.
     *
     *  + [`'name'`] string.
     *  + [`'is_active'`] bool (opcional).
     *  + [`'email'`] string (opcional).
     *  + [`'phone'`] string (opcional).
     *  + [`'cpf_cnpj'`] string (opcional).
     *  + [`'business_name'`] string (opcional).
     *  + [`'birthdate'`] string (opcional) {`Formato: Y-m-d`}.
     *  + [`'ip'`] string (opcional).
     *
     *  + [`'address'`] array (opcional) dos dados do Address.
     *  + &emsp; [`'street'`] string (opcional).
     *  + &emsp; [`'number'`] string (opcional).
     *  + &emsp; [`'district'`] string (opcional).
     *  + &emsp; [`'city'`] string (opcional).
     *  + &emsp; [`'state'`] string (opcional).
     *  + &emsp; [`'zipcode'`] string (opcional).
     *
     *  + [`'billing_address'`] array (opcional) dos dados do Billing Address.
     *  + &emsp; [`'street'`] string (opcional).
     *  + &emsp; [`'number'`] string (opcional).
     *  + &emsp; [`'district'`] string (opcional).
     *  + &emsp; [`'city'`] string (opcional).
     *  + &emsp; [`'state'`] string (opcional).
     *  + &emsp; [`'zipcode'`] string (opcional).
     *
     *  + [`'shipping_address'`] array (opcional) dos dados do Shipping Address.
     *  + &emsp; [`'street'`] string (opcional).
     *  + &emsp; [`'number'`] string (opcional).
     *  + &emsp; [`'district'`] string (opcional).
     *  + &emsp; [`'city'`] string (opcional).
     *  + &emsp; [`'state'`] string (opcional).
     *  + &emsp; [`'zipcode'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('id')->nullable();
        $schema->string('uuid')->nullable();
        $schema->string('name')->nullable();
        $schema->bool('is_active')->nullable();
        $schema->string('email')->nullable();
        $schema->string('phone')->nullable();
        $schema->string('cpf_cnpj')->nullable();
        $schema->string('tax_receipt')->nullable();
        $schema->string('business_name')->nullable();

        $schema->string('birthdate')->nullable(); //Y-m-d ou d/m/Y
        $schema->string('ip')->nullable();

        $schema->has('address', Address::class)->nullable();
        $schema->has('billing_address', Address::class)->nullable();
        $schema->has('shipping_address', Address::class)->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade id.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->get('id');
    }

    /**
     * Seta o valor da propriedade id.
     *
     * @param string|null $id
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->set('id', $id);
        return $this;
    }

    /**
     * Retorna o valor da propriedade uuid.
     *
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->get('uuid');
    }

    /**
     * Seta o valor da propriedade uuid.
     *
     * @param string|null $uuid
     * @return self
     */
    public function setUuid(?string $uuid): self
    {
        $this->set('uuid', $uuid);
        return $this;
    }

    protected function name(): Mutator
    {
        return new Mutator(null, fn($value) => strval($value));
    }

    /**
     * Retorna o valor da propriedade name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * Seta o valor da propriedade name.
     *
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name = null): self
    {
        $this->set('name', $name);
        return $this;
    }

    protected function is_active(): Mutator
    {
        return new Mutator(null, fn($value) => (bool) $value);
        ;
    }

    /**
     * Retorna o valor da propriedade is_active.
     *
     * @return boolean|null
     */
    public function getIsActive(): ?bool
    {
        return $this->get('is_active');
    }

    /**
     * Seta o valor da propriedade is_active.
     *
     * @param boolean|null $isActive
     * @return self
     */
    public function setIsActive(?bool $isActive = null): self
    {
        $this->set('is_active', $isActive);
        return $this;
    }

    protected function email(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ?
            $value :
            Assert::value($value)->email()->get() ?? $ctx->raise('inválido')
        );
    }

    /**
     * Retorna o valor da propriedade email.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->get('email');
    }

    /**
     * Seta o valor da propriedade email.
     *
     * @param string|null $email
     * @return self
     */
    public function setEmail(?string $email = null): self
    {
        $this->set('email', $email);
        return $this;
    }

    protected function phone(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ?
            $value :
            Assert::value($value)->asDigits()->lbetween(10, 11)->get() ?? $ctx->raise('inválido')
        );
    }

    /**
     * Retorna o valor da propriedade phone.
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->get('phone');
    }

    /**
     * Seta o valor da propriedade phone.
     *
     * @param string|null $phone
     * @return self
     */
    public function setPhone(?string $phone = null): self
    {
        $this->set('phone', $phone);
        return $this;
    }

    protected function cpf_cnpj(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ?
            $value :
            Assert::value($value)->asCpf(false)->or()->asCnpj(false)->get() ?? $ctx->raise('inválido')
        );
    }

    protected function tax_receipt(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ?
            $value :
            Assert::value($value)->asCpf(false)->or()->asCnpj(false)->get() ?? $ctx->raise('inválido')
        );
    }

    /**
     * Retorna o valor da propriedade tax_receipt.
     *
     * @return string|null
     */
    public function getTaxReceipt(): ?string
    {
        return $this->get('tax_receipt');
    }

    /**
     * Seta o valor da propriedade tax_receipt.
     *
     * @param string|null $taxReceipt
     * @return self
     */
    public function setTaxReceipt(?string $taxReceipt = null): self
    {
        $this->set('tax_receipt', $taxReceipt);
        return $this;
    }

    /**
     * Retorna o valor da propriedade cpf_cnpj.
     *
     * @return string|null
     */
    public function getCpfCnpj(): ?string
    {
        return $this->get('cpf_cnpj');
    }

    /**
     * Seta o valor da propriedade cpf_cnpj.
     *
     * @param string|null $cpfCnpj
     * @return self
     */
    public function setCpfCnpj(?string $cpfCnpj = null): self
    {
        $this->set('cpf_cnpj', $cpfCnpj);
        return $this;
    }

    protected function business_name(): Mutator
    {
        return new Mutator(null, null);
    }

    /**
     * Retorna o valor da propriedade business_name.
     *
     * @return string|null
     */
    public function getBusinessName(): ?string
    {
        return $this->get('business_name');
    }

    /**
     * Seta o valor da propriedade business_name.
     *
     * @param string|null $businessName
     * @return self
     */
    public function setBusinessName(?string $businessName = null): self
    {
        $this->set('business_name', $businessName);
        return $this;
    }

    protected function birthdate(): Mutator
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

    /**
     * Retorna o valor da propriedade birthdate.
     *
     * @return string|null
     */
    public function getBirthdate(): ?string
    {
        return $this->get('birthdate');
    }

    /**
     * Seta o valor da propriedade birthdate.
     *
     * @param string|null $birthdate
     * @return self
     */
    public function setBirthdate(?string $birthdate = null): self
    {
        $this->set('birthdate', $birthdate);
        return $this;
    }

    /**
     * Retorna o valor da propriedade ip.
     *
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->get('ip');
    }

    /**
     * Seta o valor da propriedade ip.
     *
     * @param string|null $ip
     * @return self
     */
    public function setIp(?string $ip = null): self
    {
        $this->set('ip', $ip);
        return $this;
    }

    /**
     * Retorna o objeto endereço do cliente.
     *
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->get('address');
    }

    /**
     * Seta o objeto endereço do cliente.
     *
     * @param Address|null $address
     * @return self
     */
    public function setAddress(?Address $address = null): self
    {
        $this->set('address', $address);
        return $this;
    }

    /**
     * Retorna o objeto endereço de cobrança do cliente.
     *
     * @return Address|null
     */
    public function getBillingAddress(): ?Address
    {
        return $this->get('billing_address');
    }

    /**
     * Seta o objeto endereço de cobrança do cliente.
     *
     * @param Address|null $address
     * @return self
     */
    public function setBillingAddress(?Address $address = null): self
    {
        $this->set('billing_address', $address);
        return $this;
    }

    /**
     * Retorna o objeto endereço de entrega do cliente.
     *
     * @return Address|null
     */
    public function getShippingAddress(): ?Address
    {
        return $this->get('shipping_address');
    }

    /**
     * Seta o objeto endereço de entrega do cliente.
     *
     * @param Address|null $address
     * @return self
     */
    public function setShippingAddress(?Address $address = null): self
    {
        $this->set('shipping_address', $address);
        return $this;
    }

}