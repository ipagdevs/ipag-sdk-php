<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Card Card
 *
 * Classe responsável por representar o recurso Card.
 *
 */
final class Card extends Model
{

    /**
     *  @param array $data
     *  array de dados do Card.
     *
     *  + [`'holderName'`] string.
     *  + [`'number'`] string.
     *  + [`'expiryMonth'`] string.
     *  + [`'expiryYear'`] string.
     *  + [`'cvv'`] string.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('holderName')->nullable();
        $schema->string('number')->nullable();
        $schema->string('expiryMonth')->nullable();
        $schema->string('expiryYear')->nullable();
        $schema->string('cvv')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `holderName`.
     *
     * @return string|null
     */
    public function getHolderName(): ?string
    {
        return $this->get('holderName');
    }

    /**
     * Seta o valor da propriedade `holderName`.
     *
     * @param string|null $holderName
     * @return self
     */
    public function setHolderName(?string $holderName = null): self
    {
        $this->set('holderName', $holderName);
        return $this;
    }

    protected function number(): Mutator
    {
        return new Mutator(null, fn($value) => Assert::value($value)->asDigits()->get());
    }

    /**
     * Retorna o valor da propriedade `number`.
     *
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->get('number');
    }

    /**
     * Seta o valor da propriedade `number`.
     *
     * @param string|null $number
     * @return self
     */
    public function setNumber(?string $number = null): self
    {
        $this->set('number', $number);
        return $this;
    }

    protected function expiryMonth(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value
            :
            (
                str_pad(
                    Assert::value(intval($value))->between(1, 12)->get()
                    ?? $ctx->raise('inválido (informe um valor de 01 à 12)')
                    ,
                    2,
                    '0',
                    STR_PAD_LEFT
                )
            )

        );
    }

    /**
     * Retorna o valor da propriedade `expiryMonth`.
     *
     * @return string|null
     */
    public function getExpiryMonth(): ?string
    {
        return $this->get('expiryMonth');
    }

    /**
     * Seta o valor da propriedade `expiryMonth`.
     *
     * @param string|null $expiryMonth
     * @return self
     */
    public function setExpiryMonth(?string $expiryMonth = null): self
    {
        $this->set('expiryMonth', $expiryMonth);
        return $this;
    }

    protected function expiryYear(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value($value)->asDigits()->lbetween(2, 2)->or()->lbetween(4, 4)->get() ?? $ctx->raise('inválido (informe um valor numérico de 2 ou 4 dígitos)')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `expiryYear`.
     *
     * @return string|null
     */
    public function getExpiryYear(): ?string
    {
        return $this->get('expiryYear');
    }

    /**
     * Seta o valor da propriedade `expiryYear`.
     *
     * @param string|null $expiryYear
     * @return self
     */
    public function setExpiryYear(?string $expiryYear = null): self
    {
        $this->set('expiryYear', $expiryYear);
        return $this;
    }

    protected function cvv(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value($value)->asDigits()->lbetween(3, 3)->or()->lbetween(4, 4)->get() ?? $ctx->raise('inválido (informe um valor numérico de 3 ou 4 dígitos)')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `cvv`.
     *
     * @return string|null
     */
    public function getCvv(): ?string
    {
        return $this->get('cvv');
    }

    /**
     * Seta o valor da propriedade `cvv`.
     *
     * @param string|null $cvv
     * @return self
     */
    public function setCvv(?string $cvv = null): self
    {
        $this->set('cvv', $cvv);
        return $this;
    }

}