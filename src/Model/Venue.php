<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Util\StateUtil;
use Kubinyete\Assertation\Assert;

/**
 * Venue Class
 *
 * Classe responsável por representar o recurso Venue.
 *
 */
final class Venue extends Model
{

    /**
     *  @param array $data
     *  array de dados do Venue.
     *
     *  + [`'name'`] string (opcional).
     *  + [`'capacity'`] int (opcional).
     *  + [`'address'`] string (opcional).
     *  + [`'city'`] string (opcional).
     *  + [`'state'`] string (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('name')->nullable();
        $schema->int('capacity')->nullable();
        $schema->string('address')->nullable();
        $schema->string('city')->nullable();
        $schema->string('state')->nullable();

        return $schema->build();
    }

    protected function capacity(): Mutator
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

    public function state(): Mutator
    {
        return new Mutator(null, fn($value) => !$value ? null : StateUtil::transformState($value));
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
     * Retorna o valor da propriedade `capacity`.
     *
     * @return integer|null
     */
    public function getCapacity(): ?int
    {
        return $this->get('capacity');
    }

    /**
     * Seta o valor da propriedade `capacity`.
     *
     * @param integer|null $capacity
     * @return self
     */
    public function setCapacity(?int $capacity = null): self
    {
        $this->set('capacity', $capacity);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `address`.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->get('address');
    }

    /**
     * Seta o valor da propriedade `address`.
     *
     * @param string|null $address
     * @return self
     */
    public function setAddress(?string $address = null): self
    {
        $this->set('address', $address);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `city`.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->get('city');
    }

    /**
     * Seta o valor da propriedade `city`.
     *
     * @param string|null $city
     * @return self
     */
    public function setCity(?string $city = null): self
    {
        $this->set('city', $city);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `state`.
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->get('state');
    }

    /**
     * Seta o valor da propriedade `state`.
     *
     * @param string|null $state
     * @return self
     */
    public function setState(?string $state = null): self
    {
        $this->set('state', $state);
        return $this;
    }

}