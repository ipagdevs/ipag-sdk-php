<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
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
     * Endpoint para criar um recurso Subscription Plan
     *
     * @param SubscriptionPlan $subscriptionPlan
     * @return object
     */
    public function create(SubscriptionPlan $subscriptionPlan): object
    {
        $response = $this->_POST($subscriptionPlan->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para alterar um recurso Subscription Plan
     *
     * @param SubscriptionPlan $subscriptionPlan
     * @param integer $id
     * @return object
     */
    public function update(SubscriptionPlan $subscriptionPlan, int $id): object
    {
        $response = $this->_PUT($subscriptionPlan, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso Subscription Plan
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
     * Endpoint para deletar um recurso Subscription Plan
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $this->_DELETE(['id' => $id]);
        return true;
    }

    /**
     * Endpoint para listar recursos Subscription Plan
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