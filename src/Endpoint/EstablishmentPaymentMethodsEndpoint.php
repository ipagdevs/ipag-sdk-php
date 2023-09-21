<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
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
     * @param string $establishment_id
     * @return object
     */
    public function config(PaymentMethod $paymentMethod, string $establishment_id): object
    {
        $response = $this->_POST(
            $paymentMethod->jsonSerialize(),
            [],
            [],
            "/{$establishment_id}/payment_methods"
        );
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

}