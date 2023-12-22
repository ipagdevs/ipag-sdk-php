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
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureById(string $id, ?float $amount = null): Response
    {
        return $this->_POST([], compact('id', 'amount'), [], '/capture');
    }

    /**
     * Endpoint para capturar um recurso `Payment`
     *
     * @param string $uuid
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureByUuid(string $uuid, ?float $amount = null): Response
    {
        return $this->_POST([], compact('uuid', 'amount'), [], '/capture');
    }

    /**
     * Endpoint para capturar um recurso `Payment`
     *
     * @param string $tid
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureByTid(string $tid, ?float $amount = null): Response
    {
        return $this->_POST([], compact('tid', 'amount'), [], '/capture');
    }

    /**
     * Endpoint para capturar um recurso `Payment`
     *
     * @param string $order_id
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function captureByOrderId(string $order_id, ?float $amount = null): Response
    {
        return $this->_POST([], compact('order_id', 'amount'), [], '/capture');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $id
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelById(string $id, ?float $amount = null): Response
    {
        return $this->_POST([], compact('id', 'amount'), [], '/cancel');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $uuid
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelByUuid(string $uuid, ?float $amount = null): Response
    {
        return $this->_POST([], compact('uuid', 'amount'), [], '/cancel');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $tid
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelByTid(string $tid, ?float $amount = null): Response
    {
        return $this->_POST([], compact('tid', 'amount'), [], '/cancel');
    }

    /**
     * Endpoint para cancelar um recurso `Payment`
     *
     * @param string $order_id
     * @param ?float $amount
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function cancelByOrderId(string $order_id, ?float $amount = null): Response
    {
        return $this->_POST([], compact('order_id', 'amount'), [], '/cancel');
    }

}