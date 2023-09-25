<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;


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
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }

    /**
     * Endpoint para obter um recurso `Transfer` vinculado a um `Seller`
     *
     * @param integer $id
     * @return Response
     */
    public function get(int $id): Response
    {
        return $this->_GET(['id' => $id]);
    }

}