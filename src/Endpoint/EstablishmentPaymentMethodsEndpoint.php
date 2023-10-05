<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\PaymentMethod;

/**
 * EstablishmentPaymentMethodsEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Establishment Payment Methods.
 *
 */

class EstablishmentPaymentMethodsEndpoint extends Endpoint
{
    protected string $location = '/service/v2/establishments';

    /**
     * Endpoint para configuração de métodos de pagamento
     *
     * @param PaymentMethod $paymentMethod
     * @param string $establishmentUuid
     * @return Response
     */
    public function config(PaymentMethod $paymentMethod, string $establishmentUuid): Response
    {
        return $this->_POST(
            $paymentMethod->jsonSerialize(),
            [],
            [],
            "/{$establishmentUuid}/payment_methods"
        );
    }

}