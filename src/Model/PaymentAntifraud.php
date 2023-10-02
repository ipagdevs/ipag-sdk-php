<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * PaymentAntifraud Class
 *
 * Classe responsável por representar o recurso PaymentAntifraud.
 */
class PaymentAntifraud extends Model
{
    /**
     *  @param array $data
     *  array de dados do Payment Antifraud.
     *
     *  + [`'fingerprint'`] string.
     *  + [`'provider'`] string.
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('fingerprint')->nullable();
        $schema->string('provider')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `fingerprint`.
     *
     * @return string|null
     */
    public function getFingerprint(): ?string
    {
        return $this->get('fingerprint');
    }

    /**
     * Seta o valor da propriedade `fingerprint`.
     *
     * @param string|null $fingerprint
     * @return self
     */
    public function setFingerprint(?string $fingerprint = null): self
    {
        $this->set('fingerprint', $fingerprint);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `provider`.
     *
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->get('provider');
    }

    /**
     * Seta o valor da propriedade `provider`.
     *
     * @param string|null $provider
     * @return self
     */
    public function setProvider(?string $provider = null): self
    {
        $this->set('provider', $provider);
        return $this;
    }

}