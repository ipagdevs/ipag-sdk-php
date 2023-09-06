<?php

namespace Ipag\Sdk\Core;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Util\ClassUtil;

/**
 * Undocumented class
 */
final class Authentication extends Model
{
    /**
     * Undocumented function
     *
     * @param string $apiId da autenticação do client
     * @param string $apiKey da autenticação do client
     */
    public function __construct($apiId, $apiKey)
    {
        parent::__construct(['api_id' => $apiId, 'api_key' => $apiKey]);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('api_id');
        $schema->string('api_key');

        return $schema->build();
    }

    /**
     * Permite acessar a propriedade api_id do objeto de autenticação do client.
     *
     * @return string
     */
    public function getApiId(): string
    {
        return $this->get('api_id');
    }

    public function setApiId(string $api_id): self
    {
        $this->set('api_id', $api_id);
        return $this;
    }

    public function getApiKey(): string
    {
        return $this->get('api_key');
    }

    public function setApiKey(string $api_key): self
    {
        $this->set('api_key', $api_key);
        return $this;
    }

}