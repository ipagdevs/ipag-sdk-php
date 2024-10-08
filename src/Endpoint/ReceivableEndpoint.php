<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;

/**
 * ReceivableEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Receivable versão `2`.
 */
class ReceivableEndpoint extends Endpoint
{
    protected string $location = 'service/v2/receivables';

    /**
     * Endpoint para listar recursos `Receivables`
     *
     * @param array|null $filters
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? [], [], '/upcoming');
    }
}