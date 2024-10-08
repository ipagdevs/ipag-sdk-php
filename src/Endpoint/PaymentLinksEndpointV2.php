<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

/**
 * PaymentLinksEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Payment Links versão `2`.
 */
class PaymentLinksEndpointV2 extends Endpoint
{
    protected string $location = '/service/v2/payment_links';

    /**
     * Endpoint para listar recursos `Payment Link`
     *
     * @param array|null $filters
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }
}