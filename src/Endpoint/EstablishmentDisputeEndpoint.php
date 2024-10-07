<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

/**
 * EstablishmentDisputeEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Establishment Dispute
 */
class EstablishmentDisputeEndpoint extends Endpoint
{
    protected string $location = '/service/v2/establishments';

    /**
     * Endpoint para listar recursos `Dispute`
     *
     * @param string $establishment_id
     * @param array|null $filters
     * @return Response
     */
    public function list(string $establishment_id, ?array $filters = []): Response
    {
        return $this->_GET([], [], "/$establishment_id/transactions/disputes");
    }

    /**
     * Endpoint para aplicar disputas aos recursos `Transactions`
     * @param string $establishment_id
     * @param array $transactions
     * @return Response
     */
    public function applyDisputes(string $establishment_id, array $transactions): Response
    {
        return $this->_POST(compact('transactions'), [], [], "/$establishment_id/transactions/dispute");
    }

    /**
     * Endpoint para aplicar charge back aos recursos `Transactions`
     * @param string $establishment_id
     * @param array $transactions
     * @return Response
     */
    public function applyChargeBacks(string $establishment_id, array $transactions): Response
    {
        return $this->_POST(compact('transactions'), [], [], "/$establishment_id/transactions/chargeback");
    }
}