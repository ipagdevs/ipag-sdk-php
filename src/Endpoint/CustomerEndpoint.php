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

    /**
     * Endpoint para criar um recurso `Customer`
     *
     * @param Customer $customer
     * @return object
     */
    public function create(Customer $customer): object
    {
        $response = $this->_POST($customer->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para atualizar um recurso `Customer`
     *
     * @param Customer $customer
     * @param integer $id
     * @return object
     */
    public function update(Customer $customer, int $id): object
    {
        $response = $this->_PUT($customer, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `Customer`
     *
     * @param integer $id
     * @return object
     */
    public function get(int $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para deletar um recurso `Customer`
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $this->_DELETE(['id' => $id]);
        return true;
    }

    /**
     * Endpoint para listar recursos `Customer`
     *
     * @param array|null $filters
     * @return object
     */
    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters ?? []);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }
}