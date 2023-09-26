<?php

namespace Ipag\Sdk\Support\Credentials\PaymentMethods;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * RedeCredentials Class
 *
 * Classe responsável pela credencial da identidade `Rede`.
 */
final class RedeCredentials extends Model
{
    /**
     *  @param array $data
     *  array de dados da credencial da Rede.
     *
     *  + [`'erede_key'`] string (opcional).
     *  + [`'pv'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }
    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('erede_key')->nullable();
        $schema->string('pv')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `erede_key`.
     *
     * @return string|null
     */
    public function getEredeKey(): ?string
    {
        return $this->get('erede_key');
    }

    /**
     * Seta o valor da propriedade `erede_key`.
     *
     * @param string|null $eredeKey
     * @return self
     */
    public function setEredeKey(?string $eredeKey = null): self
    {
        $this->set('erede_key', $eredeKey);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `pv`.
     *
     * @return string|null
     */
    public function getPv(): ?string
    {
        return $this->get('pv');
    }

    /**
     * Seta o valor da propriedade `pv`.
     *
     * @param string|null $pv
     * @return self
     */
    public function setPv(?string $pv = null): self
    {
        $this->set('pv', $pv);
        return $this;
    }

}