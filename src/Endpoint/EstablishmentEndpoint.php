<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\Establishment;

/**
 * EstablishmentEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Establishment.
 *
 */

class EstablishmentEndpoint extends Endpoint
{
    protected string $location = '/service/resources/establishments';

    /**
     * Endpoint para criar um recurso `Establishment`
     *
     * @param Establishment $establishment
     * @return object
     */
    public function create(Establishment $establishment): object
    {
        $response = $this->_POST($establishment->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para atualizar um recurso `Establishment`
     *
     * @param Establishment $establishment
     * @param string $id
     * @return object
     */
    public function update(Establishment $establishment, string $id): object
    {
        $response = $this->_PUT($establishment, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `Establishment`
     *
     * @param string $id
     * @return object
     */
    public function get(string $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para listar recursos `Establishment`
     *
     * @param array|null $filters
     * @return object
     */
    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters ?? []);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint `Transaction` do recurso `Establishment`.
     *
     * @return EstablishmentTransactionEndpoint
     */
    public function transaction(): EstablishmentTransactionEndpoint
    {
        return EstablishmentTransactionEndpoint::make($this->parent, $this->parent);
    }

    /**
     * Endpoint `PaymentMethods` do recurso `Establishment`.
     *
     * @return EstablishmentPaymentMethodsEndpoint
     */
    public function paymentMethods(): EstablishmentPaymentMethodsEndpoint
    {
        return EstablishmentPaymentMethodsEndpoint::make($this->parent, $this->parent);
    }

    /**
     * Endpoint `Antifraud` do recurso `Establishment`.
     *
     * @return EstablishmentAntifraudEndpoint
     */
    public function antifraud(): EstablishmentAntifraudEndpoint
    {
        return EstablishmentAntifraudEndpoint::make($this->parent, $this->parent);
    }
}