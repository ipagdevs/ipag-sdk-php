<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * PaymentLink Class
 *
 * Classe responsável por representar o recurso Payment Link.
 */
class PaymentLink extends Model
{
    /**
     *  @param array $data
     *  array de dados do PaymentLink.
     *
     *  + [`'external_code'`] bool (opcional).
     *  + [`'amount'`] float (opcional).
     *
     *  + [`'buttons'`] array (opcional) dos dados do Buttons.
     *  + &emsp; [`'enable'`] bool (opcional).
     *  + &emsp; [`'one'`] float (opcional).
     *  + &emsp; [`'two'`] float (opcional).
     *  + &emsp; [`'three'`] float (opcional).
     *  + &emsp; [`'description'`] string (opcional).
     *  + &emsp; [`'header'`] string (opcional).
     *  + &emsp; [`'subHeader'`] string (opcional).
     *  + &emsp; [`'expireAt'`] string (opcional) {Formato: `Y-m-d H:i:s`}.
     *
     *  + [`'checkout_settings'`] array (opcional) dos dados do Checkout Settings.
     *  + &emsp; [`'max_installments'`] int (opcional).
     *  + &emsp; [`'interest_free_installments'`] int (opcional).
     *  + &emsp; [`'min_installment_value'`] float (opcional).
     *  + &emsp; [`'interest'`] float (opcional).
     *  + &emsp; [`'fixed_installment'`] float (opcional).
     *  + &emsp; [`'payment_method'`] enum {`'all'` | `'creditcard'` | `'boleto'` | `'transfer'` | `'pix'`} (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('external_code')->nullable();
        $schema->float('amount')->nullable();
        $schema->string('description')->nullable();
        $schema->string('expireAt')->nullable();

        $schema->has('buttons', Buttons::class)->nullable();
        $schema->has('checkout_settings', CheckoutSettings::class)->nullable();

        return $schema->build();
    }

    protected function amount(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(floatval($value))->gte(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `external_code`.
     *
     * @return string|null
     */
    public function getExternalCode(): ?string
    {
        return $this->get('external_code');
    }

    /**
     * Seta o valor da propriedade `external_code`.
     *
     * @param string|null $externalCode
     * @return self
     */
    public function setExternalCode(?string $externalCode = null): self
    {
        $this->set('external_code', $externalCode);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `amount`.
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    /**
     * Seta o valor da propriedade `amount`.
     *
     * @param float|null $amount
     * @return self
     */
    public function setAmount(?float $amount = null): self
    {
        $this->set('amount', $amount);
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
     * Retorna o valor da propriedade `expireAt`.
     *
     * @return string|null
     */
    public function getExpireAt(): ?string
    {
        return $this->get('expireAt');
    }

    /**
     * Seta o valor da propriedade `expireAt`.
     *
     * @param string|null $expireAt
     * @return self
     */
    public function setExpireAt(?string $expireAt = null): self
    {
        $this->set('expireAt', $expireAt);
        return $this;
    }

    /**
     * Retorna o objeto `buttons` associado ao `PaymentLink`.
     *
     * @return Buttons|null
     */
    public function getButtons(): ?Buttons
    {
        return $this->get('buttons');
    }

    /**
     * Seta o objeto `buttons` associado ao `PaymentLink`.
     *
     * @param Buttons|null $buttons
     * @return self
     */
    public function setButtons(?Buttons $buttons = null): self
    {
        $this->set('buttons', $buttons);
        return $this;
    }

    /**
     * Retorna o objeto `CheckoutSettings` associado ao `PaymentLink`.
     *
     * @return CheckoutSettings|null
     */
    public function getCheckoutSettings(): ?CheckoutSettings
    {
        return $this->get('checkout_settings');
    }

    /**
     * Seta o objeto `CheckoutSettings` associado ao `PaymentLink`.
     *
     * @param CheckoutSettings|null $checkoutSettings
     * @return self
     */
    public function setCheckoutSettings(?CheckoutSettings $checkoutSettings = null): self
    {
        $this->set('checkout_settings', $checkoutSettings);
        return $this;
    }

}