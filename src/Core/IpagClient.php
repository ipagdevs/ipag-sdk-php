<?php

namespace Ipag\Sdk\Core;

use Ipag\Sdk\Core\IpagEnvironment;
use Ipag\Sdk\Endpoint\ChargeEndpoint;
use Ipag\Sdk\Endpoint\CheckoutEndpoint;
use Ipag\Sdk\Endpoint\CustomerEndpoint;
use Ipag\Sdk\Endpoint\EstablishmentEndpoint;
use Ipag\Sdk\Endpoint\PaymentEndpoint;
use Ipag\Sdk\Endpoint\PaymentLinksEndpoint;
use Ipag\Sdk\Endpoint\SellerEndpoint;
use Ipag\Sdk\Endpoint\SplitRulesEndpoint;
use Ipag\Sdk\Endpoint\SubscriptionEndpoint;
use Ipag\Sdk\Endpoint\SubscriptionPlanEndpoint;
use Ipag\Sdk\Endpoint\TokenEndpoint;
use Ipag\Sdk\Endpoint\TransactionEndpoint;
use Ipag\Sdk\Endpoint\TransferEndpoint;
use Ipag\Sdk\Endpoint\VoucherEndpoint;
use Ipag\Sdk\Endpoint\WebhookEndpoint;
use Ipag\Sdk\Http\Client\GuzzleHttpClient;
use Ipag\Sdk\IO\JsonSerializer;
use Psr\Log\LoggerInterface;

/**
 * IpagClient Class
 *
 * Classe principal do SDK. Responsável por instanciar os endpoint da API do IPag.
 */
class IpagClient extends Client
{

    public function IpagClient()
    {
    }

    /**
     * @param string $apiID API ID é a identificação do usuário.
     * @param string $apiKey API Key é a chave de acesso do usuário.
     * @param string Ambiente de execução (IpagEnvironment::SANDBOX | IpagEnvironment::PRODUCTION).
     * @param string $version Versão da API (valor padrão = '2').
     */
    public function __construct(string $apiID, string $apiKey, string $environment, ?LoggerInterface $logger = null, string $version = IpagEnvironment::VERSION)
    {
        parent::__construct(
            new IpagEnvironment($environment),
            new GuzzleHttpClient(
                [
                    'headers' => [
                        'x-api-version' => $version,
                    ],
                    'auth' => [$apiID, $apiKey]
                ]
            ),
            new JsonSerializer(),
            $logger
        );
    }

    public function customer(): CustomerEndpoint
    {
        return CustomerEndpoint::make($this, $this);
    }

    public function subscriptionPlan(): SubscriptionPlanEndpoint
    {
        return SubscriptionPlanEndpoint::make($this, $this);
    }

    public function subscription(): SubscriptionEndpoint
    {
        return SubscriptionEndpoint::make($this, $this);
    }

    public function transaction(): TransactionEndpoint
    {
        return TransactionEndpoint::make($this, $this);
    }

    public function token(): TokenEndpoint
    {
        return TokenEndpoint::make($this, $this);
    }

    public function charge(): ChargeEndpoint
    {
        return ChargeEndpoint::make($this, $this);
    }

    public function establishment(): EstablishmentEndpoint
    {
        return EstablishmentEndpoint::make($this, $this);
    }

    public function transfer(): TransferEndpoint
    {
        return TransferEndpoint::make($this, $this);
    }

    public function paymentLinks(): PaymentLinksEndpoint
    {
        return PaymentLinksEndpoint::make($this, $this);
    }

    public function webhook(): WebhookEndpoint
    {
        return WebhookEndpoint::make($this, $this);
    }

    public function seller(): SellerEndpoint
    {
        return SellerEndpoint::make($this, $this);
    }

    public function splitRules(): SplitRulesEndpoint
    {
        return SplitRulesEndpoint::make($this, $this);
    }

    public function voucher(): VoucherEndpoint
    {
        return VoucherEndpoint::make($this, $this);
    }

    public function checkout(): CheckoutEndpoint
    {
        return CheckoutEndpoint::make($this, $this);
    }

    public function payment(): PaymentEndpoint
    {
        return PaymentEndpoint::make($this, $this);
    }

}