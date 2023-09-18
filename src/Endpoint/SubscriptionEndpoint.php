<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Model\Subscription;

/**
 * SubscriptionEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Subscription.
 */
class SubscriptionEndpoint extends Endpoint
{
    protected string $location = '/service/resources/subscriptions';

    /**
     * Endpoint para criar um recurso `Subscription`
     *
     * @param Subscription $subscription
     * @return object
     */
    public function create(Subscription $subscription): object
    {
        $response = $this->_POST($subscription->jsonSerialize());
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para atualizar um recurso `Subscription`
     *
     * @param Subscription $subscription
     * @param integer $id
     * @return object
     */
    public function update(Subscription $subscription, int $id): object
    {
        $response = $this->_PUT($subscription, ['id' => $id]);
        return json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para obter um recurso `Subscription`
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
     * Endpoint para listar recursos `Subscription`
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
     * Endpoint para Desvincular Token de um recurso `Subscription`
     *
     * @param integer $id
     * @return void
     */
    public function unlinkToken(int $id): bool
    {
        $this->location = "/service/subscriptions/{$id}/card_token";

        $this->_DELETE(['id' => $id]);
        return true;
    }

    /**
     * Disparo de ações de parcelas de um recurso `Subscription`
     *
     * @param integer $subscription_id
     * @param integer $invoice_number
     * @param string $action
     * @return boolean|object
     */
    private function _actionsInstallmentPayment(int $subscription_id, int $invoice_number, string $action)
    {
        $this->location = '/service/resources/invoice_installments';

        $response = $this->_POST(
            ['subscription_id' => $subscription_id, 'invoice_number' => $invoice_number, 'action' => $action],
            ['subscription_id' => $subscription_id, 'invoice_number' => $invoice_number, 'action' => $action]
        );

        return $action === 'schedule' ? true : json_decode(json_encode($response->getParsed()), FALSE);
    }

    /**
     * Endpoint para quitar uma parcela de um recurso `Subscription`
     *
     * @param integer $subscription_id
     * @param integer $invoice_number
     * @return object
     */
    public function payOffInstallment(int $subscription_id, int $invoice_number): object
    {
        return $this->_actionsInstallmentPayment($subscription_id, $invoice_number, 'pay');
    }

    /**
     * Endpoint para agendar pagamento de uma parcela de um recurso `Subscription`
     *
     * @param integer $subscription_id
     * @param integer $invoice_number
     * @return object
     */
    public function scheduleInstallmentPayment(int $subscription_id, int $invoice_number): bool
    {
        return (bool) $this->_actionsInstallmentPayment($subscription_id, $invoice_number, 'schedule');
    }

}