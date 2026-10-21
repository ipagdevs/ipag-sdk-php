<?php

namespace Ipag\Sdk\Model\SubscriptionV2;

use Ipag\Sdk\Model\Customer;
use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

class SubscriptionV2 extends Model
{
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('profile_id')->nullable();
        $schema->string('description')->nullable();
        $schema->string('starting_date')->nullable();
        $schema->string('callback_url')->nullable();
        $schema->string('creditcard_token')->nullable();
        $schema->string('card_token')->nullable();
        $schema->bool('is_active')->nullable();
        $schema->int('plan_id')->nullable();
        $schema->int('customer_id')->nullable();
        $schema->has('plan', Plan::class)->nullable();
        $schema->string('frequency')->nullable();
        $schema->int('interval')->nullable();
        $schema->float('amount')->nullable();
        $schema->int('cycles')->nullable();
        $schema->has('customer', Customer::class)->nullable();

        return $schema->build();
    }

    public function jsonSerialize(): array
    {
        return array_filter(parent::jsonSerialize(), fn($v) => !is_null($v));
    }

    protected function starting_date(): Mutator
    {
        return new Mutator(
            null,
            function ($value, $ctx) {
                if (is_null($value)) {
                    return null;
                }

                $d = \DateTime::createFromFormat('Y-m-d', $value);

                return ($d && $d->format('Y-m-d') === $value) ? $value : $ctx->raise('inválido');
            }
        );
    }

    public function getProfileId(): ?string
    {
        return $this->get('profile_id');
    }

    public function setProfileId(?string $profileId): self
    {
        $this->set('profile_id', $profileId);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    public function setDescription(?string $description): self
    {
        $this->set('description', $description);
        return $this;
    }

    public function getStartingDate(): ?string
    {
        return $this->get('starting_date');
    }

    public function setStartingDate(?string $startingDate): self
    {
        $this->set('starting_date', $startingDate);
        return $this;
    }

    public function getCallbackUrl(): ?string
    {
        return $this->get('callback_url');
    }

    public function setCallbackUrl(?string $callbackUrl): self
    {
        $this->set('callback_url', $callbackUrl);
        return $this;
    }

    public function getCreditCardToken(): ?string
    {
        return $this->get('creditcard_token');
    }

    public function setCreditCardToken(?string $creditCardToken): self
    {
        $this->set('creditcard_token', $creditCardToken);
        return $this;
    }

    public function getCardToken(): ?string
    {
        return $this->get('card_token');
    }

    public function setCardToken(?string $cardToken): self
    {
        $this->set('card_token', $cardToken);
        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->get('is_active');
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->set('is_active', $isActive);
        return $this;
    }

    public function getPlanId(): ?int
    {
        return $this->get('plan_id');
    }

    public function setPlanId(?int $planId): self
    {
        $this->set('plan_id', $planId);
        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->get('customer_id');
    }

    public function setCustomerId(?int $customerId): self
    {
        $this->set('customer_id', $customerId);
        return $this;
    }

    public function getPlan(): ?Plan
    {
        return $this->get('plan');
    }

    public function setPlan(?Plan $plan): self
    {
        $this->set('plan', $plan);
        return $this;
    }

    public function getFrequency(): ?string
    {
        return $this->get('frequency');
    }

    public function setFrequency(?string $frequency): self
    {
        $this->set('frequency', $frequency);
        return $this;
    }

    public function getInterval(): ?int
    {
        return $this->get('interval');
    }

    public function setInterval(?int $interval): self
    {
        $this->set('interval', $interval);
        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->get('amount');
    }

    public function setAmount(?float $amount): self
    {
        $this->set('amount', $amount);
        return $this;
    }

    public function getCycles(): ?int
    {
        return $this->get('cycles');
    }

    public function setCycles(?int $cycles): self
    {
        $this->set('cycles', $cycles);
        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->get('customer');
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->set('customer', $customer);
        return $this;
    }
}
