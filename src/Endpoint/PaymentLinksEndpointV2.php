<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

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