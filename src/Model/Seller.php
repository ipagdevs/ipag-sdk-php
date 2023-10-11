<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Seller Class
 *
 * Classe responsável por representar o recurso Seller.
 *
 */
final class Seller extends Model
{

    /**
     *  @param array $data
     *  array de dados do recurso `Seller`
     *
     *  + [`'login'`] string (opcional).
     *  + [`'password'`] string (opcional).
     *  + [`'name'`] string (opcional).
     *  + [`'cpf_cnpj'`] string (opcional).
     *  + [`'email'`] string (opcional).
     *  + [`'phone'`] string (opcional).
     *  + [`'birthdate'`] string (opcional) {`Formato: Y-m-d`}.
     *  + [`'description'`] string (opcional).
     *
     *  + [`'address'`] array (opcional) dos dados do Address.
     *  + &emsp; [`'street'`] string (opcional).
     *  + &emsp; [`'number'`] string (opcional).
     *  + &emsp; [`'district'`] string (opcional).
     *  + &emsp; [`'city'`] string (opcional).
     *  + &emsp; [`'state'`] string (opcional).
     *  + &emsp; [`'zipcode'`] string (opcional).
     *
     *  + [`'owner'`] array (opcional) dos dados do Owner.
     *  + &emsp; [`'name'`] string (opcional).
     *  + &emsp; [`'email'`] string (opcional).
     *  + &emsp; [`'cpf'`] string (opcional).
     *  + &emsp; [`'phone'`] string (opcional)
     *  + &emsp; [`'birthdate'`] string (opcional)
     *
     *  + [`'bank'`] array (opcional) dos dados do Bank.
     *  + &emsp; [`'code'`] string (opcional).
     *  + &emsp; [`'agency'`] string (opcional).
     *  + &emsp; [`'account'`] string (opcional).
     *  + &emsp; [`'type'`] enum {`'checkings'` | `'savings'`} (opcional).
     *  + &emsp; [`'external_id'`] string (opcional)
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('login')->nullable();
        $schema->string('password')->nullable();
        $schema->string('name')->nullable();
        $schema->string('cpf_cnpj')->nullable();
        $schema->string('email')->nullable();
        $schema->string('phone')->nullable();
        $schema->string('birthdate')->nullable();
        $schema->string('description')->nullable();

        $schema->has('address', Address::class)->nullable();

        $schema->has('owner', Owner::class)->nullable();

        $schema->has('bank', Bank::class)->nullable();

        return $schema->build();
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
     * Retorna o valor da propriedade `login`.
     *
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->get('login');
    }

    /**
     * Seta o valor da propriedade `login`.
     *
     * @param string|null $login
     * @return self
     */
    public function setLogin(?string $login = null): self
    {
        $this->set('login', $login);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `password`.
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->get('password');
    }

    /**
     * Seta o valor da propriedade `password`.
     *
     * @param string|null $password
     * @return self
     */
    public function setPassword(?string $password = null): self
    {
        $this->set('password', $password);
        return $this;
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
     * Retorna o valor da propriedade `cpf_cnpj`.
     *
     * @return string|null
     */
    public function getCpfCnpj(): ?string
    {
        return $this->get('cpf_cnpj');
    }

    /**
     * Seta o valor da propriedade `cpf_cnpj`.
     *
     * @param string|null $cpf_cnpj
     * @return self
     */
    public function setCpfCnpj(?string $cpf_cnpj = null): self
    {
        $this->set('cpf_cnpj', $cpf_cnpj);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `email`.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->get('email');
    }

    /**
     * Seta o valor da propriedade `email`.
     *
     * @param string|null $email
     * @return self
     */
    public function setEmail(?string $email = null): self
    {
        $this->set('email', $email);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `phone`.
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->get('phone');
    }

    /**
     * Seta o valor da propriedade `phone`.
     *
     * @param string|null $phone
     * @return self
     */
    public function setPhone(?string $phone = null): self
    {
        $this->set('phone', $phone);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `birthdate`.
     *
     * @return string|null
     */
    public function getBirthdate(): ?string
    {
        return $this->get('birthdate');
    }

    /**
     * Seta o valor da propriedade `birthdate`.
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

    /**
     * Retorna o objeto `Address` referente ao `Seller`.
     *
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->get('address');
    }

    /**
     * Seta o objeto `Address` referente ao `Seller`.
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
     * Retorna o objeto `Owner` referente ao `Seller`.
     *
     * @return Owner|null
     */
    public function getOwner(): ?Owner
    {
        return $this->get('owner');
    }

    /**
     * Seta o objeto `Owner` referente ao `Seller`.
     *
     * @param Owner|null $owner
     * @return self
     */
    public function setOwner(?Owner $owner = null): self
    {
        $this->set('owner', $owner);
        return $this;
    }

    /**
     * Retorna o objeto `Bank` referente ao `Seller`.
     *
     * @return Bank|null
     */
    public function getBank(): ?Bank
    {
        return $this->get('bank');
    }

    /**
     * Seta o objeto `Bank` referente ao `Seller`.
     *
     * @param Bank|null $bank
     * @return self
     */
    public function setBank(?Bank $bank = null): self
    {
        $this->set('bank', $bank);
        return $this;
    }

}