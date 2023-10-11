<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
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
     * @return Response
     */
    public function create(Charge $charge): Response
    {
        return $this->_POST($charge->jsonSerialize());
    }

    /**
     * Endpoint para atualizar um recurso `Charge`
     *
     * @param Charge $charge
     * @param integer $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function update(Charge $charge, int $id): Response
    {
        return $this->_PUT($charge, ['id' => $id]);
    }

    /**
     * Endpoint para obter um recurso `Charge`
     *
     * @param integer $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function get(int $id): Response
    {
        return $this->_GET(['id' => $id]);
    }

    /**
     * Endpoint para listar recursos `Charge`
     *
     * @param array|null $filters
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }
}