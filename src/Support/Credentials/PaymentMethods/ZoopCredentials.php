<?php

namespace Ipag\Sdk\Support\Credentials\PaymentMethods;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * ZoopCredentials Class
 *
 * Classe responsável pela credencial da identidade `Zoop`.
 */
final class ZoopCredentials extends Model
{
    /**
     *  @param array $data
     *  array de dados da credencial da Zoop.
     *
     *  + [`'marketplace_id'`] string (opcional).
     *  + [`'publishable_key'`] string (opcional).
     *  + [`'seller_id'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }
    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('marketplace_id')->nullable();
        $schema->string('publishable_key')->nullable();
        $schema->string('seller_id')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `marketplace_id`.
     *
     * @return string|null
     */
    public function getMarketplaceId(): ?string
    {
        return $this->get('marketplace_id');
    }

    /**
     * Seta o valor da propriedade `marketplace_id`.
     *
     * @param string|null $marketplaceId
     * @return self
     */
    public function setMarketplaceId(?string $marketplaceId = null): self
    {
        $this->set('marketplace_id', $marketplaceId);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `publishable_key`.
     *
     * @return string|null
     */
    public function getPublishableKey(): ?string
    {
        return $this->get('publishable_key');
    }

    /**
     * Seta o valor da propriedade `publishable_key`.
     *
     * @param string|null $publishableKey
     * @return self
     */
    public function setPublishableKey(?string $publishableKey = null): self
    {
        $this->set('publishable_key', $publishableKey);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `seller_id`.
     *
     * @return string|null
     */
    public function getSellerId(): ?string
    {
        return $this->get('seller_id');
    }

    /**
     * Seta o valor da propriedade `seller_id`.
     *
     * @param string|null $sellerId
     * @return self
     */
    public function setSellerId(?string $sellerId = null): self
    {
        $this->set('seller_id', $sellerId);
        return $this;
    }

}