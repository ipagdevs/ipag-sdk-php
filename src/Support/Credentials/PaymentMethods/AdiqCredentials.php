<?php

namespace Ipag\Sdk\Support\Credentials\PaymentMethods;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * AdiqCredentials Class
 *
 * Classe responsável pela credencial da identidade `Adiq`.
 */
final class AdiqCredentials extends Model
{
    /**
     *  @param array $data
     *  array de dados da credencial da Adiq.
     *
     *  + [`'client_id'`] string (opcional).
     *  + [`'client_secret'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }
    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('client_id')->nullable();
        $schema->string('client_secret')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `client_id`.
     *
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->get('client_id');
    }

    /**
     * Seta o valor da propriedade `client_id`.
     *
     * @param string|null $clientId
     * @return self
     */
    public function setClientId(?string $clientId = null): self
    {
        $this->set('client_id', $clientId);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `client_secret`.
     *
     * @return string|null
     */
    public function getClientSecret(): ?string
    {
        return $this->get('client_secret');
    }

    /**
     * Seta o valor da propriedade `client_secret`.
     *
     * @param string|null $clientSecret
     * @return self
     */
    public function setClientSecret(?string $clientSecret = null): self
    {
        $this->set('client_secret', $clientSecret);
        return $this;
    }

}