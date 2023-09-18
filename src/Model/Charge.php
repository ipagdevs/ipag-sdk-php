<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Charge Class
 *
 * Classe responsável por representar o recurso Charge.
 *
 */
final class Charge extends Model
{

    /**
     *  @param array $data
     *  array de dados do Charge.
     *
     *  + [`'amount'`] float.
     *  + [`'description'`] string.
     *  + [`'due_date'`] string (opcional) {`Formato: Y-m-d`}.
     *  + [`'frequency'`] int (opcional).
     *  + [`'interval'`] enum {`'day'` | `'week'` | `'month'`} (opcional).
     *  + [`'type'`] enum {`'charge'` | `'recurring'`} (opcional).
     *  + [`'last_charge_date'`] string (opcional).
     *  + [`'callback_url'`] string (opcional).
     *  + [`'auto_debit'`] bool (opcional).
     *  + [`'installments'`] int (opcional).
     *  + [`'is_active'`] bool (opcional).
     *  + [`'products'`] array[`int`, `int`, `int`, ...] (opcional).
     *  + [`'customer'`] array (opcional) dos dados do Customer.
     *  + &emsp; [`'name'`] string.
     *  + &emsp; [`'email'`] string.
     *  + &emsp; [`'phone'`] string.
     *  + &emsp; [`'cpf_cnpj'`] string.
     *  + [`'checkout_settings'`] array (opcional) dos dados do CheckoutSettings.
     *  + &emsp; [`'max_installments'`] int (opcional).
     *  + &emsp; [`'interest_free_installments'`] int (opcional).
     *  + &emsp; [`'min_installment_value'`] float (opcional).
     *  + &emsp; [`'interest'`] float (opcional).
     *  + &emsp; [`'fixed_installment'`] float (opcional).
     *  + &emsp; [`'payment_method'`] enum {`'all'` | `'creditcard'` | `'boleto'` | `'transfer'` | `'pix'`} (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->float('amount')->nullable();
        $schema->string('description')->nullable();
        $schema->string('due_date')->nullable();
        $schema->int('frequency')->nullable();
        $schema->enum('interval', ['day', 'week', 'month'])->nullable();
        $schema->enum('type', ['charge', 'recurring'])->nullable();
        $schema->string('last_charge_date')->nullable();
        $schema->string('callback_url')->nullable();
        $schema->bool('auto_debit')->nullable();
        $schema->int('installments')->nullable();
        $schema->bool('is_active')->nullable();
        $schema->any('products')->nullable();

        $schema->has('customer', Customer::class)->nullable();

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

    protected function due_date(): Mutator
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

    protected function frequency(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gt(0)->get()
                ?? $ctx->raise('inválido (informe um valor de 1 à 12)')
            )
        );
    }

    protected function last_charge_date(): Mutator
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

    protected function installments(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gt(0)->get()
                ?? $ctx->raise('inválido (informe um valor de 1 à 48)')
            )
        );
    }

    protected function products(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value($value)->array() ? $value :
                $ctx->raise('inválido (informe um array de ids (int) de produtos)')
            )
        );
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
     * Retorna o valor da propriedade `due_date`.
     *
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->get('due_date');
    }

    /**
     * Seta o valor da propriedade `due_date`.
     *
     * @param string|null $due_date
     * @return self
     */
    public function setDueDate(?string $due_date = null): self
    {
        $this->set('due_date', $due_date);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `frequency`.
     *
     * @return integer|null
     */
    public function getFrequency(): ?int
    {
        return $this->get('frequency');
    }

    /**
     * Seta o valor da propriedade `frequency`.
     *
     * @param integer|null $frequency
     * @return self
     */
    public function setFrequency(?int $frequency = null): self
    {
        $this->set('frequency', $frequency);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `interval`.
     *
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->get('interval');
    }

    /**
     * Seta o valor da propriedade `interval`.
     *
     * @param string|null $interval
     * @return self
     */
    public function setInterval(?string $interval = null): self
    {
        $this->set('interval', $interval);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `type`.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->get('type');
    }

    /**
     * Seta o valor da propriedade `type`.
     *
     * @param string|null $type
     * @return self
     */
    public function setType(?string $type = null): self
    {
        $this->set('type', $type);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `last_charge_date`.
     *
     * @return string|null
     */
    public function getLastChargeDate(): ?string
    {
        return $this->get('last_charge_date');
    }

    /**
     * Seta o valor da propriedade `last_charge_date`.
     *
     * @param string|null $last_charge_date
     * @return self
     */
    public function setLastChargeDate(?string $last_charge_date = null): self
    {
        $this->set('last_charge_date', $last_charge_date);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `callback_url`.
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->get('callback_url');
    }

    /**
     * Seta o valor da propriedade `callback_url`.
     *
     * @param string|null $callback_url
     * @return self
     */
    public function setCallbackUrl(?string $callback_url = null): self
    {
        $this->set('callback_url', $callback_url);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `auto_debit`.
     *
     * @return boolean|null
     */
    public function getAutoDebit(): ?bool
    {
        return $this->get('auto_debit');
    }

    /**
     * Seta o valor da propriedade `auto_debit`.
     *
     * @param boolean|null $auto_debit
     * @return self
     */
    public function setAutoDebit(?bool $auto_debit = null): self
    {
        $this->set('auto_debit', $auto_debit);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `installments`.
     *
     * @return integer|null
     */
    public function getInstallments(): ?int
    {
        return $this->get('installments');
    }

    /**
     * Seta o valor da propriedade `installments`.
     *
     * @param integer|null $installments
     * @return self
     */
    public function setInstallments(?int $installments = null): self
    {
        $this->set('installments', $installments);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `is_active`.
     *
     * @return boolean|null
     */
    public function getIsActive(): ?bool
    {
        return $this->get('is_active');
    }

    /**
     * Seta o valor da propriedade `is_active`.
     *
     * @param boolean|null $is_active
     * @return self
     */
    public function setIsActive(?bool $is_active = null): self
    {
        $this->set('is_active', $is_active);
        return $this;
    }

    /**
     * Retorna o array `Products_Ids` associado ao `Charge`.
     *
     * @return array|null
     */
    public function getProducts(): ?array
    {
        return $this->get('products');
    }

    /**
     * Seta o array `Products_Ids` associado ao `Charge`.
     *
     * @param array|null $products
     * @return self
     */
    public function setProducts(?array $products = null): self
    {
        $this->set('products', $products);
        return $this;
    }

    /**
     * Retorna o objeto `Customer` associado ao `Charge`.
     *
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->get('customer');
    }

    /**
     * Seta o objeto `Customer` associado ao `Charge`.
     *
     * @param Customer|null $customer
     * @return self
     */
    public function setCustomer(?Customer $customer = null): self
    {
        $this->set('customer', $customer);
        return $this;
    }

    /**
     * Retorna o objeto `CheckoutSettings` associado ao `Charge`.
     *
     * @return CheckoutSettings|null
     */
    public function getCheckoutSettings(): ?CheckoutSettings
    {
        return $this->get('checkout_settings');
    }

    /**
     * Seta o objeto `CheckoutSettings` associado ao `Charge`.
     *
     * @param CheckoutSettings|null $checkout_settings
     * @return self
     */
    public function setCheckoutSettings(?CheckoutSettings $checkout_settings = null): self
    {
        $this->set('checkout_settings', $checkout_settings);
        return $this;
    }

}