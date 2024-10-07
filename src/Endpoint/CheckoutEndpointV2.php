<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\CheckoutInstallments;

/**
 * CheckoutEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Checkout versão `2`.
 */
class CheckoutEndpointV2 extends Endpoint
{
    protected string $location = '/service/v2/checkout';

    /**
     * Endpoint para obter parcelamento do recurso `Checkout`.
     *
     * @param array|null $params
     * @return Response
     */
    public function getInstallments(?CheckoutInstallments $checkoutInstallments = null): Response
    {
        return $this->_GET($checkoutInstallments->jsonSerialize(), [], '/installments');
    }
}