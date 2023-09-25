<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\Voucher;


/**
 * VoucherEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Voucher.
 *
 */

class VoucherEndpoint extends Endpoint
{
    protected string $location = '/service/resources/vouchers';

    public function create(Voucher $voucher): Response
    {
        $response = $this->_POST($voucher->jsonSerialize());
        return $response;
    }

}