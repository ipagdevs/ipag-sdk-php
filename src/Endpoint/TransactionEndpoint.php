<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;

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
     * @return object
     */
    public function get(int $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para listar recursos Transaction
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
     * Endpoint para liberar recebíveis de recurso Transaction
     *
     * @param integer $seller_id
     * @param integer $transaction_id
     * @return boolean
     */
    public function releaseReceivables(int $seller_id, int $transaction_id): bool
    {
        $response = $this->_POST(['seller_id' => $seller_id, 'transaction_id' => $transaction_id]);

        //TODO: O que retorna?
        dd($response);
    }

}