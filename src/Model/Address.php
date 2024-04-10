<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Util\StateUtil;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Address Class
 *
 * Classe responsável por representar o recurso Address.
 */
final class Address extends Model
{
    /**
     *  @param array $data
     *  array de dados do Address.
     *
     *  + [`'street'`] string (opcional).
     *  + [`'number'`] string (opcional).
     *  + [`'district'`] string (opcional).
     *  + [`'complement'`] string (opcional).
     *  + [`'city'`] string (opcional).
     *  + [`'state'`] string (opcional).
     *  + [`'zipcode'`] string (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('street')->nullable();
        $schema->string('number')->nullable();
        $schema->string('district')->nullable();
        $schema->string('complement')->nullable();
        $schema->string('city')->nullable();
        $schema->string('state')->nullable();
        $schema->string('zipcode')->nullable();

        return $schema->build();
    }

    public function street(): Mutator
    {
        return new Mutator(
            null,
            fn ($value) => strval($value)
        );
    }

    /**
     * Retorna o valor da propriedade street.
     *
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->get('street');
    }

    /**
     * Seta o valor da propriedade street.
     *
     * @param string|null $street
     * @return self
     */
    public function setStreet(?string $street): self
    {
        $this->set('street', $street);
        return $this;
    }

    public function number(): Mutator
    {
        return new Mutator(
            null,
            fn ($value) => strval($value)
        );
    }

    /**
     * Retorna o valor da propriedade number.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->get('number');
    }

    /**
     * Seta o valor da propriedade number.
     *
     * @param string|null $number
     * @return self
     */
    public function setNumber(?string $number): self
    {
        $this->set('number', $number);
        return $this;
    }

    public function district(): Mutator
    {
        return new Mutator(null, fn ($value) => strval($value));
    }

    /**
     * Retorna o valor da propriedade district.
     *
     * @return string|null
     */
    public function getDistrict(): ?string
    {
        return $this->get('district');
    }

    /**
     * Seta o valor da propriedade district.
     *
     * @param string|null $district
     * @return self
     */
    public function setDistrict(?string $district): self
    {
        $this->set('district', $district);
        return $this;
    }
    public function complement(): Mutator
    {
        return new Mutator(null, fn ($value) => strval($value));
    }

    /**
     * Retorna o valor da propriedade complement.
     *
     * @return string|null
     */
    public function getComplement(): ?string
    {
        return $this->get('complement');
    }

    /**
     * Seta o valor da propriedade complement.
     *
     * @param string|null $complement
     * @return self
     */
    public function setComplement(?string $complement): self
    {
        $this->set('complement', $complement);
        return $this;
    }
    public function city(): Mutator
    {
        return new Mutator(null, fn ($value) => strval($value));
    }

    /**
     * Retorna o valor da propriedade city.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->get('city');
    }

    /**
     * Seta o valor da propriedade city.
     *
     * @param string|null $city
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->set('city', $city);
        return $this;
    }
    public function state(): Mutator
    {
        return new Mutator(null, fn ($value) => !$value ? null : StateUtil::transformState($value));
    }

    /**
     * Retorna o valor da propriedade state.
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->get('state');
    }

    /**
     * Seta o valor da propriedade state.
     *
     * @param string|null $state
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->set('state', $state);
        return $this;
    }
    public function zipcode(): Mutator
    {
        return new Mutator(null, fn ($value) => strval(preg_replace('/\D/', '', $value)));
    }

    /**
     * Retorna o valor da propriedade zipcode.
     *
     * @return string|null
     */
    public function getZipcode(): ?string
    {
        return $this->get('zipcode');
    }

    /**
     * Seta o valor da propriedade zipcode.
     *
     * @param string|null $zipcode
     * @return self
     */
    public function setZipcode(?string $zipcode): self
    {
        $this->set('zipcode', $zipcode);
        return $this;
    }
}
