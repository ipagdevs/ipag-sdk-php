<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;

/**
 * TransferEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Future Transfer.
 *
 */

class FutureTransferEndpoint extends Endpoint
{
    protected string $location = '/service/resources/future_transfers';

    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters ?? []);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function listBySellerId(int $sellerId): object
    {
        $response = $this->_GET(['seller_id' => $sellerId]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    public function listBySellerCpfCnpj(int $sellerCpfCnpj): object
    {
        $response = $this->_GET(['cpf_cnpj' => $sellerCpfCnpj]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

}