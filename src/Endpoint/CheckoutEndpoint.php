<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\Checkout;

/**
 * CheckoutEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Checkout.
 */
class CheckoutEndpoint extends Endpoint
{
    protected string $location = '/service/resources/checkout';

    /**
     * Endpoint para criar um recurso `Checkout`.
     *
     * @param Checkout $checkout
     * @return Response
     */
    public function create(Checkout $checkout): Response
    {
        return $this->_POST($checkout->jsonSerialize());
    }
}