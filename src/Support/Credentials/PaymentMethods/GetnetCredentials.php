<?php

namespace Ipag\Sdk\Support\Credentials\PaymentMethods;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;

/**
 * GetnetCredentials Class
 *
 * Classe responsável pela credencial da identidade `Getnet`.
 */
final class GetnetCredentials extends Model
{
    /**
     *  @param array $data
     *  array de dados da credencial da Getnet.
     *
     *  + [`'establishment_number'`] string (opcional).
     *  + [`'key'`] string (opcional).
     *  + [`'user'`] string (opcional).
     *  + [`'password'`] string (opcional).
     *
     */
    public function __construct(?array $data = [])
    {
        parent::__construct($data);
    }
    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('establishment_number')->nullable();
        $schema->string('key')->nullable();
        $schema->string('user')->nullable();
        $schema->string('password')->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `establishment_number`.
     *
     * @return string|null
     */
    public function getEstablishmentNumber(): ?string
    {
        return $this->get('establishment_number');
    }

    /**
     * Seta o valor da propriedade `establishment_number`.
     *
     * @param string|null $establishmentNumber
     * @return self
     */
    public function setEstablishmentNumber(?string $establishmentNumber = null): self
    {
        $this->set('establishment_number', $establishmentNumber);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `key`.
     *
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->get('key');
    }

    /**
     * Seta o valor da propriedade `key`.
     *
     * @param string|null $key
     * @return self
     */
    public function setKey(?string $key = null): self
    {
        $this->set('key', $key);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `user`.
     *
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->get('user');
    }

    /**
     * Seta o valor da propriedade `user`.
     *
     * @param string|null $user
     * @return self
     */
    public function setUser(?string $user = null): self
    {
        $this->set('user', $user);
        return $this;
    }

    /**
     * Retorna o valor da propriedade `password`.
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->get('password');
    }

    /**
     * Seta o valor da propriedade `password`.
     *
     * @param string|null $password
     * @return self
     */
    public function setPassword(?string $password = null): self
    {
        $this->set('password', $password);
        return $this;
    }

}