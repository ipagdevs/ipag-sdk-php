<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Util\StateUtil;

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
     *  + ['street'] string (opcional).
     *  + ['number'] string (opcional).
     *  + ['district'] string (opcional).
     *  + ['city'] string (opcional).
     *  + ['state'] string (opcional).
     *  + ['zipcode'] string (opcional).
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
            fn($value) => strval($value)
        );
    }

    /**
     * Retorna a propriedade street.
     *
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->get('street');
    }

    /**
     * Seta a propriedade street.
     *
     * @param string|null $street
     * @return void
     */
    public function setStreet(?string $street): void
    {
        $this->set('street', $street);
    }
    public function number(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_numeric($value) ?
            strval(floor($value)) :
            (
                empty($value) ?
                null : $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna a propriedade number.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->get('number');
    }

    /**
     * Seta a propriedade number.
     *
     * @param string|null $number
     * @return void
     */
    public function setNumber(?string $number): void
    {
        $this->set('number', $number);
    }
    public function district(): Mutator
    {
        return new Mutator(null, fn($value) => strval($value));
    }

    /**
     * Retorna a propriedade district.
     *
     * @return string|null
     */
    public function getDistrict(): ?string
    {
        return $this->get('district');
    }

    /**
     * Seta a propriedade district.
     *
     * @param string|null $district
     * @return void
     */
    public function setDistrict(?string $district): void
    {
        $this->set('district', $district);
    }
    public function complement(): Mutator
    {
        return new Mutator(null, fn($value) => strval($value));
    }

    /**
     * Retorna a propriedade complement.
     *
     * @return string|null
     */
    public function getComplement(): ?string
    {
        return $this->get('complement');
    }

    /**
     * Seta a propriedade complement.
     *
     * @param string|null $complement
     * @return void
     */
    public function setComplement(?string $complement): void
    {
        $this->set('complement', $complement);
    }
    public function city(): Mutator
    {
        return new Mutator(null, fn($value) => strval($value));
    }

    /**
     * Retorna a propriedade city.
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->get('city');
    }

    /**
     * Seta a propriedade city.
     *
     * @param string|null $city
     * @return void
     */
    public function setCity(?string $city): void
    {
        $this->set('city', $city);
    }
    public function state(): Mutator
    {
        return new Mutator(null, fn($value) => !$value ? null : StateUtil::transformState($value));
    }

    /**
     * Retorna a propriedade state.
     *
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->get('state');
    }

    /**
     * Seta a propriedade state.
     *
     * @param string|null $state
     * @return void
     */
    public function setState(?string $state): void
    {
        $this->set('state', $state);
    }
    public function zipcode(): Mutator
    {
        return new Mutator(null, fn($value) => strval(preg_replace('/\D/', '', $value)));
    }

    /**
     * Retorna a propriedade zipcode.
     *
     * @return string|null
     */
    public function getZipcode(): ?string
    {
        return $this->get('zipcode');
    }

    /**
     * Seta a propriedade zipcode.
     *
     * @param string|null $zipcode
     * @return void
     */
    public function setZipcode(?string $zipcode): void
    {
        $this->set('zipcode', $zipcode);
    }
}