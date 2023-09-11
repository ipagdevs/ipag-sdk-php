<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\Customer;

/**
 * CustomerEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Customer.
 */
class CustomerEndpoint extends Endpoint
{
    protected string $location = '/service/resources/customers';

    public function create(Customer $customer): object
    {
        $response = $this->_POST($customer->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function update(Customer $customer, string $id): object
    {
        $response = $this->_PUT($customer, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function get(string $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function delete(string $id): bool
    {
        $this->_DELETE(['id' => $id]);
        return true;
    }

    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters ?? []);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }
}