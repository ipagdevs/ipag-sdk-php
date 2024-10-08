<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

/**
 * ChargeEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Charge versão `2`.
 */
class ChargeEndpointV2 extends Endpoint
{
    protected string $location = '/service/v2/charge';

    /**
     * Endpoint para envio de email de cobrança ao cliente.
     *
     * @param int $charge_id
     * @return Response
     */
    public function notify(int $charge_id): Response
    {
        return $this->_POST([], [], [], "/$charge_id/notify");
    }
}