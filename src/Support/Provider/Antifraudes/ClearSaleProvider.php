<?php

namespace Ipag\Sdk\Support\Provider\Antifraudes;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\Schema;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Support\Credentials\Antifraudes\ClearSaleCredentials;

/**
 * ClearSaleProvider Class
 *
 * Classe responsável pelo provider da identidade `ClearSale`.
 */
final class ClearSaleProvider extends Model
{
    /**
     *  @param array $data
     *  array de dados do Clear Sale Credentials.
     *
     *  + [`'name'`] string (opcional).
     *  + [`'password'`] string (opcional).
     */
    public function __construct(?array $data = null)
    {
        parent::__construct([
            'name' => 'clearsale',
            'credentials' => $data
        ]);
    }

    public function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('name')->default('clearsale')->nullable();
        $schema->has('credentials', ClearSaleCredentials::class)->nullable();

        return $schema->build();
    }

    /**
     * Retorna o valor da propriedade `name`.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * Retorna o valor da propriedade `credentials`.
     *
     * @return ClearSaleCredentials|null
     */
    public function getCredentials(): ?ClearSaleCredentials
    {
        return $this->get('credentials');
    }

    /**
     * Seta o valor da propriedade `credentials`.
     *
     * @param ClearSaleCredentials|null $credentials
     * @return self
     */
    public function setCredentials(?ClearSaleCredentials $credentials = null): self
    {
        $this->set('credentials', $credentials);
        return $this;
    }

}