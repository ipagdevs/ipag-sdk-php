<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

/**
 * SubscriptionEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Subscription versão `2`.
 */
class SubscriptionEndpointV2 extends Endpoint
{
    protected string $location = '/service/v2/subscription';

    /**
     * Endpoint para envio de email de cobrança ao cliente.
     *
     * @param int $subscription_id
     * @return Response
     */
    public function notify(int $subscription_id): Response
    {
        return $this->_POST([], [], [], "/$subscription_id/notify");
    }
}