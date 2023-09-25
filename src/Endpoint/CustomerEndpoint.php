<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
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
     * @return Response
     */
    public function create(Customer $customer): Response
    {
        return $this->_POST($customer->jsonSerialize());
    }

    /**
     * Endpoint para atualizar um recurso `Customer`
     *
     * @param Customer $customer
     * @param integer $id
     * @return Response
     */
    public function update(Customer $customer, int $id): Response
    {
        return $this->_PUT($customer, ['id' => $id]);
    }

    /**
     * Endpoint para obter um recurso `Customer`
     *
     * @param integer $id
     * @return Response
     */
    public function get(int $id): Response
    {
        return $this->_GET(['id' => $id]);
    }

    /**
     * Endpoint para deletar um recurso `Customer`
     *
     * @param integer $id
     * @return Response
     */
    public function delete(int $id): Response
    {
        return $this->_DELETE(['id' => $id]);
    }

    /**
     * Endpoint para listar recursos `Customer`
     *
     * @param array|null $filters
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }
}