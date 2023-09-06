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
     *  + ['name'] string.
     *  + ['is_active'] bool (opcional).
     *  + ['email'] string (opcional).
     *  + ['phone'] string (opcional).
     *  + ['cpf_cnpj'] string (opcional).
     *  + ['business_name'] string (opcional).
     *
     *  + ['address'] array (opcional) dos dados do Address.
     *      + ['address']['street'] string (opcional).
     *      + ['address']['number'] string (opcional).
     *      + ['address']['district'] string (opcional).
     *      + ['address']['city'] string (opcional).
     *      + ['address']['state'] string (opcional).
     *      + ['address']['zipcode'] string (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('id')->nullable()->isHidden();
        $schema->string('uuid')->nullable()->isHidden();
        $schema->string('name')->nullable();
        $schema->bool('is_active')->nullable()->isHidden();
        $schema->string('email')->nullable();
        $schema->string('phone')->nullable();
        $schema->string('cpf_cnpj')->nullable();
        $schema->string('business_name')->nullable();

        $schema->string('birthdate')->nullable()->isHidden(); //Y-m-d ou d/m/Y
        $schema->string('ip')->nullable()->isHidden();

        $schema->string('created_at')->nullable()->isHidden();
        $schema->string('updated_at')->nullable()->isHidden();
        $schema->has('address', Address::class)->nullable();

        return $schema->build();
    }

    public function getId(): ?string
    {
        return $this->get('id');
    }

    public function setId(?string $id): self
    {
        $this->set('id', $id);
        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->get('uuid');
    }

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
     * Retorna a propriedade name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * Seta a propriedade name.
     *
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self
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
     * Retorna a propriedade is_active.
     *
     * @return boolean|null
     */
    public function getIsActive(): ?bool
    {
        return $this->get('is_active');
    }

    /**
     * Seta a propriedade is_active.
     *
     * @param boolean|null $isActive
     * @return self
     */
    public function setIsActive(?bool $isActive): self
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
     * Retorna a propriedade email.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->get('email');
    }

    /**
     * Seta a propriedade email.
     *
     * @param string|null $email
     * @return self
     */
    public function setEmail(?string $email): self
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
     * Retorna a propriedade phone.
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->get('phone');
    }

    /**
     * Seta a propriedade phone.
     *
     * @param string|null $phone
     * @return self
     */
    public function setPhone(?string $phone): self
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

    /**
     * Retorna a propriedade cpf_cnpj.
     *
     * @return string|null
     */
    public function getCpfCnpj(): ?string
    {
        return $this->get('cpf_cnpj');
    }

    /**
     * Seta a propriedade cpf_cnpj.
     *
     * @param string|null $cpfCnpj
     * @return self
     */
    public function setCpfCnpj(?string $cpfCnpj): self
    {
        $this->set('cpf_cnpj', $cpfCnpj);
        return $this;
    }

    protected function business_name(): Mutator
    {
        return new Mutator(null, null);
    }

    /**
     * Retorna a propriedade business_name.
     *
     * @return string|null
     */
    public function getBusinessName(): ?string
    {
        return $this->get('business_name');
    }

    /**
     * Seta a propriedade business_name.
     *
     * @param string|null $businessName
     * @return self
     */
    public function setBusinessName(?string $businessName): self
    {
        $this->set('business_name', $businessName);
        return $this;
    }

    public function getBirthdate(): ?string
    {
        return $this->get('birthdate');
    }

    public function setBirthdate(?string $birthdate): self
    {
        $this->set('birthdate', $birthdate);
        return $this;
    }

    public function getIp(): ?string
    {
        return $this->get('ip');
    }

    public function setIp(?string $ip): self
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
    public function setAddress(?Address $address): self
    {
        $this->set('address', $address);
        return $this;
    }
}