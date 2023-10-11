<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\Seller;

/**
 * SellerEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Seller.
 */
class SellerEndpoint extends Endpoint
{
    protected string $location = '/service/resources/sellers';

    /**
     * Endpoint para criar um recurso `Seller`
     *
     * @param Seller $seller
     * @return Response
     */
    public function create(Seller $seller): Response
    {
        return $this->_POST($seller->jsonSerialize());
    }

    /**
     * Endpoint para atualizar um recurso `Seller`
     *
     * @param Seller $seller
     * @param integer $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function update(Seller $seller, int $id): Response
    {
        return $this->_PUT($seller, ['id' => $id]);
    }

    /**
     * Endpoint para obter um recurso `Seller`
     *
     * @param integer $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function get(int $id): Response
    {
        return $this->_GET(['id' => $id]);
    }

    /**
     * Endpoint para listar recursos `Seller`
     *
     * @param array|null $filters
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }

}