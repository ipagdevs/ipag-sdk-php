<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

/**
 * TransferEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Future Transfer.
 *
 */

class FutureTransferEndpoint extends Endpoint
{
    protected string $location = '/service/resources/future_transfers';

    /**
     * Endpoint para listar recursos `Future Transfer`
     *
     * @param array|null $filters
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }

    /**
     * Endpoint para listar recursos `Future Transfer` vinculado a um `Seller` (Pesquisar por `Id`)
     *
     * @param integer $sellerId
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function listBySellerId(int $sellerId): Response
    {
        return $this->_GET(['seller_id' => $sellerId]);
    }

    /**
     * Endpoint para listar recursos `Future Transfer` vinculado a um `Seller` (Pesquisar por `CpfCnpj`)
     *
     * @param string $sellerCpfCnpj
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function listBySellerCpfCnpj(string $sellerCpfCnpj): Response
    {
        return $this->_GET(['cpf_cnpj' => $sellerCpfCnpj]);
    }

}