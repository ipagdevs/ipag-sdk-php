<?php

namespace Ipag\Sdk\Support\Credentials\Antifraudes;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * KondutoCredentials Class
 *
 * Classe responsável pela credencial a identidade `Konduto`.
 */
final class KondutoCredentials extends Model
{
    /**
     *  @param array $data
     *  array de dados do Clear Sale.
     *
     *  + [`'apiKey'`] string (opcional).
     *  + [`'publicKey'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('apiKey')->nullable();
        $schema->string('publicKey')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `apiKey`.
     *
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->get('apiKey');
    }

    /**
     * Seta o valor da propriedade `apiKey`.
     *
     * @param string|null $apiKey
     * @return self
     */
    public function setApiKey(?string $apiKey = null): self
    {
        $this->set('apiKey', $apiKey);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `publicKey`.
     *
     * @return string|null
     */
    public function getPublicKey(): ?string
    {
        return $this->get('publicKey');
    }

    /**
     * Seta o valor da propriedade `publicKey`.
     *
     * @param string|null $publicKey
     * @return self
     */
    public function setPublicKey(?string $publicKey = null): self
    {
        $this->set('publicKey', $publicKey);
        return $this;
    }

}