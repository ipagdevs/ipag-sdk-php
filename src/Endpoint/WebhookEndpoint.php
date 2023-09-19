<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\Webhook;


/**
 * WebhookEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Webhook.
 *
 */
class WebhookEndpoint extends Endpoint
{

    protected string $location = '/service/resources/webhooks';

    /**
     * Endpoint para criar um recurso `webhook`
     *
     * @param Webhook $webhook
     * @return object
     */
    public function create(Webhook $webhook): object
    {
        $response = $this->_POST($webhook->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `webhook`
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
     * Endpoint para listar recursos `webhook`
     *
     * @param array|null $filters
     * @return object
     */
    public function list(?array $filters = []): object
    {
        $response = $this->_GET($filters ?? []);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para deletar um recurso `webhook`
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $this->_DELETE(['id' => $id]);
        return true;
    }

}