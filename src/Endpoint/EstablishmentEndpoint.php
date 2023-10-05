<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
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
     * @return Response
     */
    public function create(Establishment $establishment): Response
    {
        return $this->_POST($establishment->jsonSerialize());
    }

    /**
     * Endpoint para atualizar um recurso `Establishment`
     *
     * @param Establishment $establishment
     * @param string $uuid
     * @return Response
     */
    public function update(Establishment $establishment, string $uuid): Response
    {
        return $this->_PUT($establishment, ['id' => $uuid]);
    }

    /**
     * Endpoint para obter um recurso `Establishment`
     *
     * @param string $uuid
     * @return Response
     */
    public function get(string $uuid): Response
    {
        return $this->_GET(['id' => $uuid]);
    }

    /**
     * Endpoint para listar recursos `Establishment`
     *
     * @param array|null $filters
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
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