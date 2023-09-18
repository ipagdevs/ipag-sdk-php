<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;


/**
 * TransferEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Seller Transfer.
 *
 */

class SellerTransferEndpoint extends Endpoint
{
    protected string $location = '/service/resources/sellers_transfers';

    /**
     * Endpoint para listar recursos `Transfer` vinculados aos `Sellers`
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
     * Endpoint para obter um recurso `Transfer` vinculado a um `Seller`
     *
     * @param integer $id
     * @return object
     */
    public function get(int $id): object
    {
        $response = $this->_GET(['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

}