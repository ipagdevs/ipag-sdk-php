<?php

namespace Ipag\Sdk\Core;

final class IpagEnvironmentWebhook
{
    // public const TRANSACTION_CREATED = "TransactionCreated";

    /**
     * Link de Pagamento recebeu um pagamento aprovado.
     */
    public const PAYMENT_LINK_PAYMENT_SUCCEEDED = 'PaymentLinkPaymentSucceeded';

    /**
     * Link de Pagamento recebeu um pagamento recusado.
     */
    public const PAYMENT_LINK_PAYMENT_FAILED = 'PaymentLinkPaymentFailed';

    /**
     * O pagamento da Assinatura foi processado com sucesso.
     */
    public const SUBSCRIPTION_PAYMENT_SUCCEEDED = 'SubscriptionPaymentSucceeded';

    /**
     * O pagamento da Assinatura foi processado com falha.
     */
    public const SUBSCRIPTION_PAYMENT_FAILED = 'SubscriptionPaymentFailed';

    /**
     * O pagamento da Cobrança foi processado com sucesso.
     */
    public const CHARGE_PAYMENT_SUCCEEDED = 'ChargePaymentSucceeded';

    /**
     * O pagamento da Cobrança foi processado com falha.
     */
    public const CHARGE_PAYMENT_FAILED = 'ChargePaymentFailed';

    /**
     * A Transação foi criada.
     */
    public const TRANSACTION_CREATED = 'TransactionCreated';

    /**
     * A Transação está aguardando pagamento do boleto.
     */
    public const TRANSACTION_WAITING_PAYMENT = 'TransactionWaitingPayment';

    /**
     * A Transação foi cancelada com sucesso.
     */
    public const TRANSACTION_CANCELED = 'TransactionCanceled';

    /**
     * A Transação foi Pré-Autorizada com sucesso.
     */
    public const TRANSACTION_PRE_AUTHORIZED = 'TransactionPreAuthorized';

    /**
     * A Transação foi Capturada com sucesso.
     */
    public const TRANSACTION_CAPTURED = 'TransactionCaptured';

    /**
     * A Transação teve a autorização recusada pela Adquirente.
     */
    public const TRANSACTION_DENIED = 'TransactionDenied';

    /**
     * A Transação sofreu disputa do Pagador/Cliente.
     */
    public const TRANSACTION_DISPUTED = 'TransactionDisputed';

    /**
     * A Transação foi Estornada, e o valor devolvido ao Pagador/Cliente.
     */
    public const TRANSACTION_CHARGEDBACK = 'TransactionChargedback';

    /**
     * A Transferência foi realizada com sucesso.
     */
    public const TRANSFER_PAYMENT_SUCCEEDED = 'TransferPaymentSucceeded';

    /**
     * A Transferência foi realizada com falha.
     */
    public const TRANSFER_PAYMENT_FAILED = 'TransferPaymentFailed';

}