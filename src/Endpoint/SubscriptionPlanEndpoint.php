<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\SubscriptionPlan;

/**
 * SubscriptionPlanEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Subscription Plan.
 */
class SubscriptionPlanEndpoint extends Endpoint
{
    protected string $location = '/service/resources/plans';

    /**
     * Endpoint para criar um recurso `Subscription Plan`
     *
     * @param SubscriptionPlan $subscriptionPlan
     * @return Response
     */
    public function create(SubscriptionPlan $subscriptionPlan): Response
    {
        return $this->_POST($subscriptionPlan->jsonSerialize());
    }

    /**
     * Endpoint para atualizar um recurso `Subscription Plan`
     *
     * @param SubscriptionPlan $subscriptionPlan
     * @param integer $id
     * @return Response
     */
    public function update(SubscriptionPlan $subscriptionPlan, int $id): Response
    {
        return $this->_PUT($subscriptionPlan, ['id' => $id]);
    }

    /**
     * Endpoint para obter um recurso `Subscription Plan`
     *
     * @param integer $id
     * @return Response
     */
    public function get(int $id): Response
    {
        return $this->_GET(['id' => $id]);
    }

    /**
     * Endpoint para deletar um recurso `Subscription Plan`
     *
     * @param integer $id
     * @return Response
     */
    public function delete(int $id): Response
    {
        return $this->_DELETE(['id' => $id]);
    }

    /**
     * Endpoint para listar recursos `Subscription Plan`
     *
     * @param array|null $filters
     * @return Response
     */
    public function list(?array $filters = []): Response
    {
        return $this->_GET($filters ?? []);
    }

}