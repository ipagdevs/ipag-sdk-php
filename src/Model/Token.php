<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Token Class
 *
 * Classe responsável por representar o recurso Token.
 */
class Token extends Model
{
    /**
     *  @param array $data
     *  array de dados do Token.
     *
     *  + [`'value'`] string.
     *  + [`'validated_at'`] string.
     *  + [`'expires_at'`] string.
     *  + [`'Card'`] array (opcional) dos dados do Card.
     *  + &emsp; [`'holderName'`] string.
     *  + &emsp; [`'number'`] string.
     *  + &emsp; [`'expiryMonth'`] string.
     *  + &emsp; [`'expiryYear'`] string.
     *  + &emsp; [`'cvv'`] string.
     *  + [`'Holder'`] array (opcional) dos dados do Holder.
     *  + &emsp; [`'name'`] string.
     *  + &emsp; [`'cpfCnpj'`] string.
     *  + &emsp; [`'mobilePhone'`] string.
     *  + &emsp; [`'birthdate'`] string.
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
        $schema->string('value')->nullable();
        $schema->string('validated_at')->nullable();
        $schema->string('expires_at')->nullable();

        $schema->has('card', Card::class)->nullable();
        $schema->has('holder', Holder::class)->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `value`.
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->get('value');
    }

    /**
     * Seta o valor da propriedade `value`.
     *
     * @param string|null $value
     * @return self
     */
    public function setValue(?string $value = null): self
    {
        $this->set('value', $value);
        return $this;
    }

    protected function validated_at(): Mutator
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
     * Retorna o valor da propriedade `validatedAt`.
     *
     * @return string|null
     */
    public function getValidatedAt(): ?string
    {
        return $this->get('validated_at');
    }

    /**
     * Seta o valor da propriedade `validatedAt`.
     *
     * @param string|null $validatedAt
     * @return self
     */
    public function setValidatedAt(?string $validatedAt = null): self
    {
        $this->set('validated_at', $validatedAt);
        return $this;
    }

    protected function expires_at(): Mutator
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
     * Retorna o valor da propriedade `expiresAt`.
     *
     * @return string|null
     */
    public function getExpiresAt(): ?string
    {
        return $this->get('expires_at');
    }

    /**
     * Seta o valor da propriedade `expiresAt`.
     *
     * @param string|null $expiresAt
     * @return self
     */
    public function setExpiresAt(?string $expiresAt = null): self
    {
        $this->set('expires_at', $expiresAt);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `card`.
     *
     * @return Card|null
     */
    public function getCard(): ?Card
    {
        return $this->get('card');
    }

    /**
     * Seta o valor da propriedade `card`.
     *
     * @param Card|null $card
     * @return self
     */
    public function setCard(?Card $card = null): self
    {
        $this->set('card', $card);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `holder`.
     *
     * @return Holder|null
     */
    public function getHolder(): ?Holder
    {
        return $this->get('holder');
    }

    /**
     * Seta o valor da propriedade `holder`.
     *
     * @param Holder|null $holder
     * @return self
     */
    public function setHolder(?Holder $holder = null): self
    {
        $this->set('holder', $holder);
        return $this;
    }

}