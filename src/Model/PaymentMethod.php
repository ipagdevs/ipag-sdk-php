<?php

namespace Ipag\Sdk\Model;

use Ipag\Sdk\Model\Schema\Mutator;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Kubinyete\Assertation\Assert;

/**
 * PaymentMethod Class
 *
 * Classe responsável por representar o recurso PaymentMethod.
 */
class PaymentMethod extends Model
{

    /**
     * @param array|null $data
     * array de dados do recurso `PaymentMethod`
     *
     *  + [`'acquirer'`] string (opcional).
     *  + [`'priority'`] int (opcional) {`Range: 0 à 100`}.
     *  + [`'environment'`] enum {`'production'` | `'test'` | `'inactive'`} (opcional).
     *  + [`'capture'`] bool (opcional).
     *  + [`'retry'`] bool (opcional).
     *  + [`'credentials'`] array (opcional).
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('acquirer')->nullable();

        $schema->int('priority')->nullable();

        $schema->enum('environment', ['production', 'test', 'inactive'])->nullable();

        $schema->bool('capture')->nullable();

        $schema->bool('retry')->nullable();

        $schema->any('credentials')->nullable();

        return $schema->build();
    }

    protected function priority(): Mutator
    {
        return new Mutator(
            null,
            fn($value, $ctx) =>
            is_null($value) ? $value :
            (
                Assert::value(intval($value))->gte(0)->get()
                ?? $ctx->raise('inválido')
            )
        );
    }

    /**
     * Retorna o valor da propriedade `acquirer`.
     *
     * @return string|null
     */
    public function getAcquirer(): ?string
    {
        return $this->get('acquirer');
    }

    /**
     * Retorna o valor da propriedade `acquirer`.
     *
     * @param string|null $acquirer
     * @return self
     */
    public function setAcquirer(?string $acquirer = null): self
    {
        $this->set('acquirer', $acquirer);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `priority`.
     *
     * @return integer|null
     */
    public function getPriority(): ?int
    {
        return $this->get('priority');
    }

    /**
     * Seta o valor da propriedade `priority`.
     *
     * @param integer|null $priority
     * @return self
     */
    public function setPriority(?int $priority = null): self
    {
        $this->set('priority', $priority);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `environment`.
     *
     * @return string|null
     */
    public function getEnvironment(): ?string
    {
        return $this->get('environment');
    }

    /**
     * Seta o valor da propriedade `environment`.
     *
     * @param string|null $environment
     * @return self
     */
    public function setEnvironment(?string $environment = null): self
    {
        $this->set('environment', $environment);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `capture`.
     *
     * @return boolean|null
     */
    public function getCapture(): ?bool
    {
        return $this->get('capture');
    }

    /**
     * Seta o valor da propriedade `capture`.
     *
     * @param boolean|null $capture
     * @return self
     */
    public function setCapture(?bool $capture = null): self
    {
        $this->set('capture', $capture);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `retry`.
     *
     * @return boolean|null
     */
    public function getRetry(): ?bool
    {
        return $this->get('retry');
    }

    /**
     * Seta o valor da propriedade `retry`.
     *
     * @param boolean|null $retry
     * @return self
     */
    public function setRetry(?bool $retry = null): self
    {
        $this->set('retry', $retry);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `credentials`.
     *
     * @return array|null
     */
    public function getCredentials(): ?array
    {
        return $this->get('credentials');
    }

    /**
     * Seta o valor da propriedade `credentials`.
     *
     * @param array|null $credentials
     * @return self
     */
    public function setCredentials(?array $credentials = null): self
    {
        $this->set('credentials', $credentials);
        return $this;
    }

}