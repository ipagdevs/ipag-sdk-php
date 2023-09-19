<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;


/**
 * TransferEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Transfer.
 *
 */

class TransferEndpoint extends Endpoint
{
    protected string $location = '/service/resources/transfers';

    /**
     * Endpoint para listar recursos `Transfer`
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
     * Endpoint para obter um recurso `Transfer`
     *
     * @param integer $id
     * @return object
     */
    public function get(int $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    //TODO: Testar endpoint
    public function seller(): SellerTransferEndpoint
    {
        return SellerTransferEndpoint::make($this->parent, $this->parent);
    }

    //TODO: Testar endpoint
    public function future(): FutureTransferEndpoint
    {
        return FutureTransferEndpoint::make($this->parent, $this->parent);
    }

}