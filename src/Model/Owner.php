<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Owner Class
 *
 * Classe responsável por representar o recurso Owner.
 */
class Owner extends Model
{
    /**
     *  @param array $data
     *  array de dados do Owner.
     *
     *  + [`'name'`] string (opcional).
     *  + [`'email'`] string (opcional).
     *  + [`'cpf'`] string (opcional).
     *  + [`'phone'`] string (opcional)
     *  + [`'birthdate'`] string (opcional)
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('name')->nullable();
        $schema->string('email')->nullable();
        $schema->string('cpf')->nullable();
        $schema->string('phone')->nullable();
        $schema->string('birthdate')->nullable();

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

    protected function cpf(): Mutator
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

    /**
     * Retorna o valor da propriedade cpf.
     *
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->get('cpf');
    }

    /**
     * Seta o valor da propriedade cpf.
     *
     * @param string|null $cpf
     * @return self
     */
    public function setCpf(?string $cpf = null): self
    {
        $this->set('cpf', $cpf);
        return $this;
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

}