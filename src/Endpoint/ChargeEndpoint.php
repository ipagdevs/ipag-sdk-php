<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\Charge;

/**
 * ChargeEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Charge.
 */
class ChargeEndpoint extends Endpoint
{
    protected string $location = '/service/resources/charges';

    /**
     * Endpoint para criar um novo recurso `Charge`
     *
     * @param Charge $charge
     * @return object
     */
    public function create(Charge $charge): object
    {
        $response = $this->_POST($charge->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para atualizar um recurso `Charge`
     *
     * @param Charge $charge
     * @param integer $id
     * @return object
     */
    public function update(Charge $charge, int $id): object
    {
        $response = $this->_PUT($charge, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `Charge`
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
     * Endpoint para listar recursos `Charge`
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