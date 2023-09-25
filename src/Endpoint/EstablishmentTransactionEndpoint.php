<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

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
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters, [], '/transactions');
    }

    /**
     * Endpoint para listar todos os recursos `Transaction` de um recurso `Establishment`
     *
     * @param string $tid
     * @param array|null $filters
     * @return Response
     */
    public function listByEstablishment(string $tid, ?array $filters = []): Response
    {
        return $this->_GET($filters, [], "/$tid/transactions");
    }

    /**
     * Endpoint para obter um recurso `Transaction` de um recurso `Establishment`
     *
     * @param string $tid
     * @param string $transactionTid
     * @return Response
     */
    public function getByEstablishment(string $tid, string $transactionTid): Response
    {
        return $this->_GET([], [], "/{$tid}/transactions/{$transactionTid}");
    }

}