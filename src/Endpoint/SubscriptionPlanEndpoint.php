<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\SubscriptionPlan;

class SubscriptionPlanEndpoint extends Endpoint
{
    protected string $location = '/service/resources/plans';

    public function create(SubscriptionPlan $subscriptionPlan): object
    {
        $response = $this->_POST($subscriptionPlan->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }
    public function update()
    {
    }
    public function get()
    {
    }
    public function delete()
    {
    }
    public function list()
    {
    }

}