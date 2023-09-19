<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\PaymentLink;

/**
 * PaymentLinksEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Payment Links.
 */
class PaymentLinksEndpoint extends Endpoint
{
    protected string $location = '/service/resources/payment_links';

    /**
     * Endpoint para criar um recurso `Payment Link`
     *
     * @param PaymentLink $paymentLink
     * @return object
     */
    public function create(PaymentLink $paymentLink): object
    {
        $response = $this->_POST($paymentLink->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `Payment Link`
     *
     * @param integer $id
     * @return object
     */
    public function getById(int $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function getByExternalCode(int $externalCode): object
    {
        $response = $this->_GET(['external_code' => $externalCode]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }
}