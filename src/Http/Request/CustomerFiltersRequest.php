<?php

namespace Ipag\Sdk\Http\Request;

use Ipag\Sdk\Model\Model;
use Ipag\Sdk\Model\Schema\SchemaBuilder;
use Ipag\Sdk\Model\Schema\Schema;

/**
 * CustomerFiltersRequest Class
 */
final class CustomerFiltersRequest extends Model
{
    /**
     * array de filtros de resources do Customer.
     *
     * ['name'] string (opcional) filtrar registros pelo campo 'Name' do Customer.
     *
     * ['cpf_cnpj'] string (opcional) filtrar registros pelo campo 'CPF/CNPJ' do Customer.
     *
     * ['email'] string (opcional) filtrar registros pelo campo 'Email' do Customer.
     *
     * ['phone'] string (opcional) filtrar registros pelo campo 'Phone' do Customer.
     *
     * ['is_active'] bool (opcional) filtrar registros pelo campo 'IsActive' do Customer.
     *
     * ['page'] int (opcional) número da página dos recursos.
     *
     * ['order'] string (opcional) ordem dos recursos ('asc' ou 'desc').
     *
     *  @param array $filters
     */
    public function __construct(?array $filters = [])
    {
        parent::__construct($filters);
    }

    protected function schema(SchemaBuilder $schema): Schema
    {
        $schema->string('name')->nullable();
        $schema->string('cpf_cnpj')->nullable();
        $schema->string('email')->nullable();
        $schema->string('phone')->nullable();
        $schema->bool('is_active')->nullable();
        $schema->int('page')->nullable();
        $schema->enum('order', ['asc', 'desc'])->nullable();

        return $schema->build();
    }
}