<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
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
     * @return object
     */
    public function create(Seller $seller): object
    {
        $response = $this->_POST($seller->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para atualizar um recurso `Seller`
     *
     * @param Seller $seller
     * @param integer $id
     * @return object
     */
    public function update(Seller $seller, int $id): object
    {
        $response = $this->_PUT($seller, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `Seller`
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
     * Endpoint para listar recursos `Seller`
     *
     * @param array|null $filters
     * @return object
     */
    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters ?? []);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

}