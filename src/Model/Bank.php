<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * Bank Class
 *
 * Classe responsável por representar o recurso Bank.
 */
class Bank extends Model
{
    /**
     *  @param array $data
     *  array de dados do Bank.
     *
     *  + [`'code'`] string (opcional).
     *  + [`'agency'`] string (opcional).
     *  + [`'account'`] string (opcional).
     *  + [`'type'`] enum {`'checkings'` | `'savings'`} (opcional).
     *  + [`'external_id'`] string (opcional)
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('code')->nullable();
        $schema->string('agency')->nullable();
        $schema->string('account')->nullable();
        $schema->enum('type', ['checkings', 'savings'])->nullable();
        $schema->string('external_id')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade code
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->get('code');
    }

    /**
     * Seta o valor da propriedade code
     *
     * @param string|null $code
     * @return self
     */
    public function setCode(?string $code = null): self
    {
        $this->set('code', $code);
        return $this;
    }

    /**
     * Retorna o valor da propriedade agency
     *
     * @return string|null
     */
    public function getAgency(): ?string
    {
        return $this->get('agency');
    }

    /**
     * Seta o valor da propriedade agency
     *
     * @param string|null $agency
     * @return self
     */
    public function setAgency(?string $agency = null): self
    {
        $this->set('agency', $agency);
        return $this;
    }

    /**
     * Retorna o valor da propriedade account
     *
     * @return string
     */
    public function getAccount(): ?string
    {
        return $this->get('account');
    }

    /**
     * Seta o valor da propriedade account
     *
     * @param string|null $account
     * @return self
     */
    public function setAccount(string $account = null): self
    {
        $this->set('account', $account);
        return $this;
    }

    /**
     * Retorna o valor da propriedade type
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->get('type');
    }

    /**
     * Seta o valor da propriedade type
     *
     * @param string|null $type
     * @return self
     */
    public function setType(?string $type = null): self
    {
        $this->set('type', $type);
        return $this;
    }

    /**
     * Retorna o valor da propriedade external_id
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->get('external_id');
    }

    /**
     * Seta o valor da propriedade external_id
     *
     * @param string|null $external_id
     * @return self
     */
    public function setExternalId(?string $external_id = null): self
    {
        $this->set('external_id', $external_id);
        return $this;
    }

}