<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;

/**
 * EstablishmentTransactionEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Establishment Transaction.
 *
 */

class EstablishmentTransactionEndpoint extends Endpoint
{
    protected string $location = '/service/v2/establishments';

    /**
     * Endpoint para listar todos os recursos `Transaction` dos recursos `Establishment`
     *
     * @param array|null $filters
     * @return object
     */
    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters, [], '/transactions');
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para listar todos os recursos `Transaction` de um recurso `Establishment`
     *
     * @param string $tid
     * @param array|null $filters
     * @return object
     */
    public function listByEstablishment(string $tid, ?array $filters = []): object
    {
        $response = $this->_GET($filters, [], "/$tid/transactions");
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `Transaction` de um recurso `Establishment`
     *
     * @param string $tid
     * @param string $transactionTid
     * @return object
     */
    public function getByEstablishment(string $tid, string $transactionTid): object
    {
        $response = $this->_GET([], [], "/{$tid}/transactions/{$transactionTid}");
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

}