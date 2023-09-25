<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

/**
 * TransactionEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Transaction.
 */
class TransactionEndpoint extends Endpoint
{
    protected string $location = '/service/resources/transactions';

    /**
     * Endpoint para obter um recurso Transaction
     *
     * @param integer $id
     * @return Response
     */
    public function get(int $id): Response
    {
        return $this->_GET(['id' => $id]);
    }

    /**
     * Endpoint para listar recursos Transaction
     *
     * @param array|null $filters
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }

    /**
     * Endpoint para liberar recebíveis de recurso Transaction
     *
     * @param integer $seller_id
     * @param integer $transaction_id
     * @return Response
     */
    public function releaseReceivables(int $seller_id, int $transaction_id): Response
    {
        return $this->_POST(['seller_id' => $seller_id, 'transaction_id' => $transaction_id]);
    }

}