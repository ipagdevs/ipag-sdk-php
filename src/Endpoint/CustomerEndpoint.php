<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Collection\CustomerCollection;
use Ipag\Sdk\Http\Request\CustomerFiltersRequest;
use Ipag\Sdk\Http\Resource\CustomerResource;
use Ipag\Sdk\Model\Customer;

/**
 * CustomerEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Customer.
 */
class CustomerEndpoint extends Endpoint
{
    protected string $location = '/service/resources/customers';

    public function create(Customer $customer): CustomerResource
    {
        $response = $this->_POST($customer->jsonSerialize());
        return CustomerResource::parse($response->getParsed());
    }

    public function update(string $id, Customer $customer): CustomerResource
    {
        $response = $this->_PUT($customer, ['id' => $id]);
        return CustomerResource::parse($response->getParsed());
    }

    public function get(string $id): CustomerResource
    {
        $response = $this->_GET(['id' => $id]);
        return CustomerResource::parse($response->getParsed());
    }

    public function delete(string $id): bool
    {
        $this->_DELETE(['id' => $id]);
        return true;
    }

    public function list(?CustomerFiltersRequest $filters = null): CustomerCollection
    {
        $response = $this->_GET([$filters ?? []]);
        return CustomerCollection::parse($response->getParsed());
    }
}