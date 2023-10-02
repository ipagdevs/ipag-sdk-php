<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * PaymentTransaction Class
 *
 * Classe responsável por representar o recurso Payment Transaction.
 *
 */
final class PaymentTransaction extends Model
{
    /**
     *  @param array $data
     *  array de dados do Payment Transaction.
     *
     *  + [`'amount'`] float.
     *  + [`'order_id'`] string.
     *  + [`'callback_url'`] string.
     *
     *  + [`'antifraud'`] array (opcional) dos dados do Antifraud.
     *  + &emsp; [`'fingerprint'`] string.
     *  + &emsp; [`'provider'`] string.
     *
     *  + [`'payment'`] array (opcional) dos dados do Payment.
     *  + &emsp; [`'type'`] string.
     *  + &emsp; [`'method'`] string.
     *  + &emsp; [`'installments'`] int.
     *  + &emsp; [`'capture'`] bool.
     *  + &emsp; [`'fraud_analysis'`] bool.
     *  + &emsp; [`'softdescriptor'`] string.
     *  + &emsp; [`'pix_expires_in'`] int.
     *  + &emsp; [`'card'`] array (opcional) dos dados do Card.
     *  + &emsp;&emsp; [`'holder'`] string.
     *  + &emsp;&emsp; [`'number'`] string.
     *  + &emsp;&emsp; [`'expiry_month'`] string.
     *  + &emsp;&emsp; [`'expiry_year'`] string.
     *  + &emsp;&emsp; [`'cvv'`] string.
     *  + &emsp;&emsp; [`'token'`] string.
     *  + &emsp;&emsp; [`'tokenize'`] bool.
     *  + &emsp; [`'boleto'`] array (opcional) dos dados do Boleto.
     *  + &emsp;&emsp; [`'due_date'`] string (opcional) {Formato: `Y-m-d H:i:s`}.
     *  + &emsp;&emsp; [`'instructions'`] array (opcional) dos dados da instruções.
     *  + &emsp;&emsp;&emsp; [`'instruction'`] string (opcional).
     *  + &emsp;&emsp;&emsp; `...`
     *
     *  + [`'customer'`] array (opcional) dos dados do Customer.
     *  + &emsp; [`'name'`] string.
     *  + &emsp; [`'cpf_cnpj'`] string.
     *  + &emsp; [`'email'`] string.
     *  + &emsp; [`'phone'`] string.
     *  + &emsp; [`'birthdate'`] string {`Formato: Y-m-d`}.
     *  + &emsp; [`'ip'`] string.
     *  + &emsp; [`'billing_address'`] array (opcional) dos dados do Address.
     *  + &emsp;&emsp; `...`
     *  + &emsp; [`'shipping_address'`] array (opcional) dos dados do Address.
     *  + &emsp;&emsp; `...`
     *
     *  + [`'subscription'`] array (opcional) dos dados do Subscription.
     *  + &emsp; [`'frequency'`] int.
     *  + &emsp; [`'interval'`] string.
     *  + &emsp; [`'starting_date'`] string {`Formato: Y-m-d`}.
     *  + &emsp; [`'amount'`] float.
     *  + &emsp; [`'installments'`] int.
     *  + &emsp; [`'cycles'`] int.
     *
     *  + [`'split_rules'`] array (opcional) dos dados do Split Rules.
     *  + &emsp; [`'seller_id'`] string.
     *  + &emsp; [`'percentage'`] float.
     *  + &emsp; [`'amount'`] float.
     *  + &emsp; [`'liable'`] bool.
     *  + &emsp; [`'charge_processing_fee'`] bool.
     *  + &emsp; [`'hold_receivables'`] bool.
     *
     *  + [`'products'`] array (opcional) dos dados do Product.
     *  + &emsp; [
     *  + &emsp;&emsp; [`'name'`] string
     *  + &emsp;&emsp; [`'unit_price'`] string
     *  + &emsp;&emsp; [`'quantity'`] int
     *  + &emsp;&emsp; [`'sku'`] string
     *  + &emsp;&emsp; [`'description'`] string
     *  + &emsp; ], [`...`]
     *
     *  + [`'event'`] array (opcional) dos dados do Event.
     *  + &emsp; [`'name'`] string (opcional).
     *  + &emsp; [`'date'`] string (opcional).
     *  + &emsp; [`'type'`] string (opcional).
     *  + &emsp; [`'subtype'`] string (opcional).
     *  + &emsp; [`'venue'`] array (opcional) dos dados do Venue.
     *  + &emsp;&emsp; [`'name'`] string (opcional).
     *  + &emsp;&emsp; [`'capacity'`] int (opcional).
     *  + &emsp;&emsp; [`'address'`] string (opcional).
     *  + &emsp;&emsp; [`'city'`] string (opcional).
     *  + &emsp;&emsp; [`'state'`] string (opcional).
     *  + &emsp; [`'tickets'`] array (opcional) dos dados do `Ticket`.
     *  + &emsp;&emsp; [`'id'`] string (opcional).
     *  + &emsp;&emsp; [`'category'`] string (opcional).
     *  + &emsp;&emsp; [`'premium'`] bool (opcional).
     *  + &emsp;&emsp; [`'section'`] string (opcional).
     *  + &emsp;&emsp; [`'attendee'`] array (opcional) dos dados do Attendee.
     *  + &emsp;&emsp; &emsp; [`'document'`] string (opcional).
     *  + &emsp;&emsp; &emsp; [`'dob'`] string (opcional) {Formato: `Y-m-d`}.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->float('amount')->nullable();
        $schema->string('order_id')->nullable();
        $schema->string('callback_url')->nullable();

        $schema->has('antifraud', PaymentAntifraud::class)->nullable();
        $schema->has('payment', Payment::class)->nullable();
        $schema->has('customer', Customer::class)->nullable();
        $schema->hasMany('products', Product::class)->nullable();
        $schema->has('subscription', PaymentSubscription::class)->nullable();
        $schema->hasMany('split_rules', PaymentSplitRules::class)->nullable();
        $schema->has('event', Event::class)->nullable();

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
     * Retorna o valor da propriedade `order_id`.
     *
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->get('order_id');
    }

    /**
     * Seta o valor da propriedade `order_id`.
     *
     * @param string|null $orderId
     * @return self
     */
    public function setOrderId(?string $orderId = null): self
    {
        $this->set('order_id', $orderId);
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
     * @param string|null $callbackUrl
     * @return self
     */
    public function setCallbackUrl(?string $callbackUrl = null): self
    {
        $this->set('callback_url', $callbackUrl);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `PaymentAntifraud`.
     *
     * @return PaymentAntifraud|null
     */
    public function getAntifraud(): ?PaymentAntifraud
    {
        return $this->get('antifraud');
    }

    /**
     * Seta o valor da propriedade `PaymentAntifraud`.
     *
     * @param PaymentAntifraud|null $antifraud
     * @return self
     */
    public function setAntifraud(?PaymentAntifraud $antifraud = null): self
    {
        $this->set('antifraud', $antifraud);
        return $this;
    }

    /**
     * Retorna o objeto `Payment` vinculado ao `PaymentTransaction`
     *
     * @return Payment|null
     */
    public function getPayment(): ?Payment
    {
        return $this->get('payment');
    }

    /**
     * Seta o objeto `Payment` vinculado ao `PaymentTransaction`
     *
     * @param Payment|null $payment
     * @return self
     */
    public function setPayment(?Payment $payment = null): self
    {
        $this->set('payment', $payment);
        return $this;
    }

    /**
     * Retorna o objeto `Customer` vinculado ao `PaymentTransaction`
     *
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->get('customer');
    }

    /**
     * Seta o objeto `Customer` vinculado ao `PaymentTransaction`
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
     * Retorna o array `Product` vinculado ao `PaymentTransaction`
     *
     * @return array|null
     */
    public function getProducts(): ?array
    {
        return $this->get('products');
    }

    /**
     * Seta o array `Product` vinculado ao `PaymentTransaction`
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
     * Adiciona um `Product` ao `PaymentTransaction`
     *
     * @param Product $product
     * @return self
     */
    public function addProduct(Product $product): self
    {
        $this->set(
            'products',
            array_merge(
                $this->get('products'),
                [
                    $product
                ]
            )
        );

        return $this;
    }

    /**
     * Retorna o objeto `PaymentSubscription` vinculado ao `PaymentTransaction`
     *
     * @return PaymentSubscription|null
     */
    public function getSubscription(): ?PaymentSubscription
    {
        return $this->get('subscription');
    }

    /**
     * Seta o objeto `PaymentSubscription` vinculado ao `PaymentTransaction`
     *
     * @param PaymentSubscription|null $subscription
     * @return self
     */
    public function setSubscription(?PaymentSubscription $subscription = null): self
    {
        $this->set('subscription', $subscription);
        return $this;
    }

    /**
     * Retorna um array com os objetos `PaymentSplitRules` vinculados ao `PaymentTransaction`o objeto `PaymentSplitRules` vinculado ao `PaymentTransaction`
     *
     * @return array|null
     */
    public function getSplitRules(): ?array
    {
        return $this->get('split_rules');
    }

    /**
     * Seta o array com os objetos `PaymentSplitRules` vinculado ao `PaymentTransaction`
     *
     * @param array|null $splitRules
     * @return self
     */
    public function setSplitRules(?array $splitRules = null): self
    {
        $this->set('split_rules', $splitRules);
        return $this;
    }

    /**
     * Adiciona um `PaymentSplitRules` ao `PaymentTransaction`
     *
     * @param PaymentSplitRules $splitRules
     * @return self
     */
    public function addSplitRules(PaymentSplitRules $splitRules): self
    {
        $this->set(
            'split_rules',
            array_merge(
                $this->get('split_rules'),
                [
                    $splitRules
                ]
            )
        );

        return $this;
    }

    /**
     * Retorna o objeto `Event` vinculado ao `PaymentTransaction`
     *
     * @return Event|null
     */
    public function getEvent(): ?Event
    {
        return $this->get('event');
    }

    /**
     * Seta o objeto `Event` vinculado ao `PaymentTransaction`
     *
     * @param Event|null $event
     * @return self
     */
    public function setEvent(?Event $event = null): self
    {
        $this->set('event', $event);
        return $this;
    }

}