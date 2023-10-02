<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * PaymentCard Class
 *
 * Classe responsável por representar o recurso PaymentCard.
 *
 */
final class PaymentCard extends Model
{
    /**
     *  @param array $data
     *  array de dados do Card.
     *
     *  + [`'holder'`] string.
     *  + [`'number'`] string.
     *  + [`'expiry_month'`] string.
     *  + [`'expiry_year'`] string.
     *  + [`'cvv'`] string.
     *  + [`'token'`] string.
     *  + [`'tokenize'`] bool.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('holder')->nullable();
        $schema->string('number')->nullable();
        $schema->string('expiry_month')->nullable();
        $schema->string('expiry_year')->nullable();
        $schema->string('cvv')->nullable();
        $schema->string('token')->nullable();
        $schema->bool('tokenize')->nullable();

        return $schema->build();
    }

    protected function number(): Mutator
    {
        return new Mutator(null, fn($value) => Assert::value($value)->asDigits()->get());
    }

    protected function expiry_month(): Mutator
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

    protected function expiry_year(): Mutator
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
     * Retorna o valor da propriedade `holder`.
     *
     * @return string|null
     */
    public function getHolder(): ?string
    {
        return $this->get('holder');
    }

    /**
     * Seta o valor da propriedade `holder`.
     *
     * @param string|null $holder
     * @return self
     */
    public function setHolder(?string $holder = null): self
    {
        $this->set('holder', $holder);
        return $this;
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

    /**
     * Retorna o valor da propriedade `expiry_month`.
     *
     * @return string|null
     */
    public function getExpiryMonth(): ?string
    {
        return $this->get('expiry_month');
    }

    /**
     * Seta o valor da propriedade `expiry_month`
     *
     * @param string|null $expiry_month
     * @return self
     */
    public function setExpiryMonth(?string $expiry_month = null): self
    {
        $this->set('expiry_month', $expiry_month);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `expiry_year`.
     *
     * @return string|null
     */
    public function getExpiryYear(): ?string
    {
        return $this->get('expiry_year');
    }

    /**
     * Seta o valor da propriedade `expiry_year`
     *
     * @param string|null $expiry_year
     * @return self
     */
    public function setExpiryYear(?string $expiry_year = null): self
    {
        $this->set('expiry_year', $expiry_year);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `token`.
     *
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->get('token');
    }

    /**
     * Seta o valor da propriedade `token`
     *
     * @param string|null $token
     * @return self
     */
    public function setToken(?string $token = null): self
    {
        $this->set('token', $token);
        return $this;
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
     * Seta o valor da propriedade `cvv`
     *
     * @param string|null $cvv
     * @return self
     */
    public function setCvv(?string $cvv = null): self
    {
        $this->set('cvv', $cvv);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `tokenize`.
     *
     * @return boolean|null
     */
    public function getTokenize(): ?bool
    {
        return $this->get('tokenize');
    }

    /**
     * Seta o valor da propriedade `tokenize`
     *
     * @param boolean|null $tokenize
     * @return self
     */
    public function setTokenize(?bool $tokenize = null): self
    {
        $this->set('tokenize', $tokenize);
        return $this;
    }

}