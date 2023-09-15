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

    public function create(Charge $charge): object
    {
        $response = $this->_POST($charge->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function update(Charge $charge, int $id): object
    {
        $response = $this->_PUT($charge, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function get(int $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters ?? []);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }
}