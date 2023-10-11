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
     *
     * @codeCoverageIgnore
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters, [], '/transactions');
    }

    /**
     * Endpoint para listar todos os recursos `Transaction` de um recurso `Establishment`
     *
     * @param string $uuid
     * @param array|null $filters
     * @return Response
     */
    public function listByEstablishment(string $uuid, ?array $filters = []): Response
    {
        return $this->_GET($filters, [], "/$uuid/transactions");
    }

    /**
     * Endpoint para obter um recurso `Transaction` de um recurso `Establishment`
     *
     * @param string $uuid
     * @param string $transactionUuid
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function getByEstablishment(string $uuid, string $transactionUuid): Response
    {
        return $this->_GET([], [], "/{$uuid}/transactions/{$transactionUuid}");
    }

}