<?php

namespace Ipag\Sdk\Support\Credentials\Antifraudes;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * RedShieldCredentials Class
 *
 * Classe responsável pela credencial a identidade `Red Shield`.
 */
final class RedShieldCredentials extends Model
{

    /**
     *  @param array $data
     *  array de dados do Clear Sale.
     *
     *  + [`'token'`] string (opcional).
     *  + [`'entityId'`] string (opcional).
     *  + [`'channelId'`] string (opcional).
     *  + [`'serviceId'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('token')->nullable();
        $schema->string('entityId')->nullable();
        $schema->string('channelId')->nullable();
        $schema->string('serviceId')->nullable();

        return $schema->build();
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
     * Seta o valor da propriedade `token`.
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
     * Retorna o valor da propriedade `entityId`.
     *
     * @return string|null
     */
    public function getEntityId(): ?string
    {
        return $this->get('entityId');
    }

    /**
     * Seta o valor da propriedade `entityId`.
     *
     * @param string|null $entityId
     * @return self
     */
    public function setEntityId(?string $entityId = null): self
    {
        $this->set('entityId', $entityId);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `channelId`.
     *
     * @return string|null
     */
    public function getChannelId(): ?string
    {
        return $this->get('channelId');
    }

    /**
     * Seta o valor da propriedade `channelId`.
     *
     * @param string|null $channelId
     * @return self
     */
    public function setChannelId(?string $channelId = null): self
    {
        $this->set('channelId', $channelId);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `serviceId`.
     *
     * @return string|null
     */
    public function getServiceId(): ?string
    {
        return $this->get('serviceId');
    }

    /**
     * Seta o valor da propriedade `serviceId`.
     *
     * @param string|null $serviceId
     * @return self
     */
    public function setServiceId(?string $serviceId = null): self
    {
        $this->set('serviceId', $serviceId);
        return $this;
    }

}