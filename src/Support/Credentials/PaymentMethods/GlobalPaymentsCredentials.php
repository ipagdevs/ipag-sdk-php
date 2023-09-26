<?php

namespace Ipag\Sdk\Support\Credentials\PaymentMethods;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * GlobalPaymentsCredentials Class
 *
 * Classe responsável pela credencial da identidade `GlobalPayments`.
 */
final class GlobalPaymentsCredentials extends Model
{
    /**
     *  @param array $data
     *  array de dados da credencial da GlobalPayments.
     *
     *  + [`'terminal'`] string (opcional).
     *  + [`'merchant_id'`] string (opcional).
     *  + [`'merchant_key'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }
    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('terminal')->nullable();
        $schema->string('merchant_id')->nullable();
        $schema->string('merchant_key')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `terminal`.
     *
     * @return string|null
     */
    public function getTerminal(): ?string
    {
        return $this->get('terminal');
    }

    /**
     * Seta o valor da propriedade `terminal`.
     *
     * @param string|null $terminal
     * @return self
     */
    public function setTerminal(?string $terminal = null): self
    {
        $this->set('terminal', $terminal);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `merchant_id`.
     *
     * @return string|null
     */
    public function getMerchantId(): ?string
    {
        return $this->get('merchant_id');
    }

    /**
     * Seta o valor da propriedade `merchant_id`.
     *
     * @param string|null $merchantId
     * @return self
     */
    public function setMerchantId(?string $merchantId = null): self
    {
        $this->set('merchant_id', $merchantId);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `merchant_key`.
     *
     * @return string|null
     */
    public function getMerchantKey(): ?string
    {
        return $this->get('merchant_key');
    }

    /**
     * Seta o valor da propriedade `merchant_key`.
     *
     * @param string|null $merchantKey
     * @return self
     */
    public function setMerchantKey(?string $merchantKey = null): self
    {
        $this->set('merchant_key', $merchantKey);
        return $this;
    }

}