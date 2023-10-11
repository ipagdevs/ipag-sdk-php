<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\PaymentTransaction;

/**
 * PaymentEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Payment.
 */
class PaymentEndpoint extends Endpoint
{
    protected string $location = '/service';

    /**
     * Endpoint para criar um novo recurso `Payment`
     *
     * @param PaymentTransaction $paymentTransaction
     * @return Response
     */
    public function create(PaymentTransaction $paymentTransaction): Response
    {
        return $this->_POST($paymentTransaction->jsonSerialize(), [], [], '/payment');
    }

    /**
     * Endpoint para obter um recurso `Payment`
     *
     * @param string $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function getById(string $id): Response
    {
        return $this->_GET(['id' => $id], [], '/consult');
    }

    /**
     * Endpoint para obter um recurso `Payment`
     *
     * @param string $uuid
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function getByUuid(string $uuid): Response
    {
        return $this->_GET(['uuid' => $uuid], [], '/consult');
    }

    /**
     * Endpoint para obter um recurso `Payment`
     *
     * @param string $tid
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function getByTid(string $tid): Response
    {
        return $this->_GET(['tid' => $tid], [], '/consult');
    }

    /**
     * Endpoint para obter um recurso `Payment`
     *
     * @param string $orderId
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function getByOrderId(string $orderId): Response
    {
        return $this->_GET(['order_id' => $orderId], [], '/consult');
    }

    /**
     * Endpoint para capturar um recurso `Payment`
     *
     * @param string $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureById(string $id): Response
    {
        return $this->_POST([], ['id' => $id], [], '/capture');
    }

    /**
     * Endpoint para capturar um recurso `Payment`
     *
     * @param string $uuid
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureByUuid(string $uuid): Response
    {
        return $this->_POST([], ['uuid' => $uuid], [], '/capture');
    }

    /**
     * Endpoint para capturar um recurso `Payment`
     *
     * @param string $tid
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureByTid(string $tid): Response
    {
        return $this->_POST([], ['tid' => $tid], [], '/capture');
    }

    /**
     * Endpoint para capturar um recurso `Payment`
     *
     * @param string $orderId
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureByOrderId(string $orderId): Response
    {
        return $this->_POST([], ['order_id' => $orderId], [], '/capture');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelById(string $id): Response
    {
        return $this->_POST([], ['id' => $id], [], '/cancel');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $uuid
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelByUuid(string $uuid): Response
    {
        return $this->_POST([], ['uuid' => $uuid], [], '/cancel');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $tid
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelByTid(string $tid): Response
    {
        return $this->_POST([], ['tid' => $tid], [], '/cancel');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $orderId
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelByOrderId(string $orderId): Response
    {
        return $this->_POST([], ['order_id' => $orderId], [], '/cancel');
    }

}