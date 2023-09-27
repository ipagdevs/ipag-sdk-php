<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * Subscription Class
 *
 * Classe responsável por representar o recurso Subscription.
 */
class Subscription extends Model
{
    /**
     *  @param array $data
     *  array de dados do Subscription.
     *
     *  + [`'is_active'`] bool.
     *  + [`'profile_id'`] string.
     *  + [`'plan_id'`] int.
     *  + [`'customer_id'`] int.
     *  + [`'starting_date'`] string (opcional) {`Formato: Y-m-d`}.
     *  + [`'closing_date'`] string (opcional) {`Formato: Y-m-d`}.
     *  + [`'callback_url'`] string (opcional).
     *  + [`'creditcard_token'`] string (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->bool('is_active')->nullable();
        $schema->string('profile_id')->nullable();
        $schema->int('plan_id')->nullable();
        $schema->int('customer_id')->nullable();
        $schema->string('starting_date')->nullable();
        $schema->string('closing_date')->nullable();
        $schema->string('callback_url')->nullable();
        $schema->string('creditcard_token')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `is_active`
     *
     * @return boolean|null
     */
    public function getIsActive(): ?bool
    {
        return $this->get('is_active');
    }

    /**
     * Seta o valor da propriedade `is_active`
     *
     * @param boolean|null $isActive
     * @return self
     */
    public function setIsActive(?bool $isActive = null): self
    {
        $this->set('is_active', $isActive);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `profile_id`
     *
     * @return string|null
     */
    public function getProfileId(): ?string
    {
        return $this->get('profile_id');
    }

    /**
     * Seta o valor da propriedade `profile_id`
     *
     * @param string|null $profileId
     * @return self
     */
    public function setProfileId(?string $profileId = null): self
    {
        $this->set('profile_id', $profileId);
        return $this;
    }

    protected function plan_id(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                (settype($value, 'int')) ? $value :
                $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `plan_id`
     *
     * @return integer|null
     */
    public function getPlanId(): ?int
    {
        return $this->get('plan_id');
    }

    /**
     * Seta o valor da propriedade `plan_id`
     *
     * @param integer|null $planId
     * @return self
     */
    public function setPlanId(?int $planId = null): self
    {
        $this->set('plan_id', $planId);
        return $this;
    }

    protected function customer_id(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                (settype($value, 'int')) ? $value :
                $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `customer_id`
     *
     * @return integer|null
     */
    public function getCustomerId(): ?int
    {
        return $this->get('customer_id');
    }

    /**
     * Seta o valor da propriedade `customer_id`
     *
     * @param integer|null $customerId
     * @return self
     */
    public function setCustomerId(?int $customerId = null): self
    {
        $this->set('customer_id', $customerId);
        return $this;
    }

    protected function starting_date(): Mutator
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
     * Retorna o valor da propriedade `starting_date`
     *
     * @return string|null
     */
    public function getStartingDate(): ?string
    {
        return $this->get('starting_date');
    }

    /**
     * Seta o valor da propriedade `starting_date`
     *
     * @param string|null $startingDate
     * @return self
     */
    public function setStartingDate(?string $startingDate = null): self
    {
        $this->set('starting_date', $startingDate);
        return $this;
    }

    protected function closing_date(): Mutator
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
     * Retorna o valor da propriedade `closing_date`
     *
     * @return string|null
     */
    public function getClosingDate(): ?string
    {
        return $this->get('closing_date');
    }

    /**
     * Seta o valor da propriedade `closing_date`
     *
     * @param string|null $closingDate
     * @return self
     */
    public function setClosingDate(?string $closingDate = null): self
    {
        $this->set('closing_date', $closingDate);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `callback_url`
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string
    {
        return $this->get('callback_url');
    }

    /**
     * Seta o valor da propriedade `callback_url`
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
     * Retorna o valor da propriedade `creditcard_token`
     *
     * @return string|null
     */
    public function getCreditcardToken(): ?string
    {
        return $this->get('creditcard_token');
    }

    /**
     * Seta o valor da propriedade `creditcard_token`
     *
     * @param string|null $creditcardToken
     * @return self
     */
    public function setCreditcardToken(?string $creditcardToken = null): self
    {
        $this->set('creditcard_token', $creditcardToken);
        return $this;
    }

}