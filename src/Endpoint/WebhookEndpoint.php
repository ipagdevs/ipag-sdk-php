<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
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
     * @return Response
     */
    public function create(Webhook $webhook): Response
    {
        return $this->_POST($webhook->jsonSerialize());
    }

    /**
     * Endpoint para obter um recurso `webhook`
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
     * Endpoint para listar recursos `webhook`
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

    /**
     * Endpoint para deletar um recurso `webhook`
     *
     * @param integer $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function delete(int $id): Response
    {
        return $this->_DELETE(['id' => $id]);
    }

}