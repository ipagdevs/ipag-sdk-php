<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Establishment Class
 *
 * Classe responsável por representar o recurso Establishment.
 */
class Establishment extends Model
{
    /**
     *  @param array $data
     *  array de dados do Establishment.
     *
     *  + [`'name'`] string (opcional)
     *  + [`'email'`] string (opcional)
     *  + [`'login'`] string (opcional)
     *  + [`'password'`] string (opcional)
     *  + [`'document'`] string (opcional)
     *  + [`'phone'`] string (opcional)
     *  + [`'address'`] array (opcional) dos dados do Address.
     *  + &emsp; [`'street'`] string (opcional).
     *  + &emsp; [`'number'`] string (opcional).
     *  + &emsp; [`'district'`] string (opcional).
     *  + &emsp; [`'city'`] string (opcional).
     *  + &emsp; [`'state'`] string (opcional).
     *  + &emsp; [`'zipcode'`] string (opcional).
     *  + [`'owner'`] array (opcional) dos dados do Owner.
     *  + &emsp; [`'name'`] string (opcional).
     *  + &emsp; [`'email'`] string (opcional).
     *  + &emsp; [`'cpf'`] string (opcional).
     *  + &emsp; [`'phone'`] string (opcional).
     *  + [`'bank'`] array '`] array (opcional) dos dados do Bank.
     *  + &emsp; [`'code'`] string (opcional).
     *  + &emsp; [`'agency'`] string (opcional).
     *  + &emsp; [`'account'`] string (opcional).
     *  + &emsp; [`'type'`] enum {`'checkings'` | `'savings'`} (opcional).
     *  + &emsp; [`'external_id'`] string (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {

        $schema->string('name')->nullable();
        $schema->string('email')->nullable();
        $schema->string('login')->nullable();
        $schema->string('password')->nullable()->isHidden();
        $schema->string('document')->nullable();
        $schema->string('phone')->nullable();

        $schema->has('address', Address::class)->nullable();
        $schema->has('owner', Owner::class)->nullable();
        $schema->has('bank', Bank::class)->nullable();

        return $schema->build();
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

    protected function document(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ?
            $value :
            Assert::value($value)->asCpf(false)->get() ?? $ctx->raise('inválido')
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

    /**
     * Retorna o valor da propriedade name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * Seta o valor da propriedade name
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
     * Retorna o valor da propriedade email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->get('email');
    }

    /**
     * Seta o valor da propriedade email
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
     * Retorna o valor da propriedade login
     *
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->get('login');
    }

    /**
     * Seta o valor da propriedade login
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
     * Retorna o valor da propriedade password
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->get('password');
    }

    /**
     * Seta o valor da propriedade password
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
     * Retorna o valor da propriedade document
     *
     * @return string|null
     */
    public function getDocument(): ?string
    {
        return $this->get('document');
    }

    /**
     * Seta o valor da propriedade document
     *
     * @param string|null $document
     * @return self
     */
    public function setDocument(?string $document = null): self
    {
        $this->set('document', $document);
        return $this;
    }

    /**
     * Retorna o valor da propriedade phone
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->get('phone');
    }

    /**
     * Seta o valor da propriedade phone
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
     * Retorna o valor da propriedade address
     *
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->get('address');
    }

    /**
     * Seta o valor da propriedade address
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
     * Retorna o valor da propriedade owner
     *
     * @return Owner|null
     */
    public function getOwner(): ?Owner
    {
        return $this->get('owner');
    }

    /**
     * Seta o valor da propriedade owner
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
     * Retorna o valor da propriedade bank
     *
     * @return Bank|null
     */
    public function getBank(): ?Bank
    {
        return $this->get('bank');
    }

    /**
     * Seta o valor da propriedade bank
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