<?php

namespace Ipag\Sdk\Core\Enums;

abstract class PaymentStatus
{
    /**
     * Status: `Iniciado`
     */
    public const CREATED = 1;
    /**
     * Status: `Boleto Impresso`
     */
    public const WAITING_PAYMENT = 2;
    /**
     * Status: `Cancelado`
     */
    public const CANCELED = 3;
    /**
     * Status: `Em análise`
     */
    public const IN_ANALYSIS = 4;
    /**
     * Status: `Pré-Autorizado`
     */
    public const PRE_AUTHORIZED = 5;
    /**
     * Status: `Autorizado Valor Parcial`
     */
    public const PARTIAL_CAPTURED = 6;
    /**
     * Status: `Recusado`
     */
    public const DECLINED = 7;
    /**
     * Status: `Aprovado e Capturado`
     */
    public const CAPTURED = 8;
    /**
     * Status: `Chargeback`
     */
    public const CHARGEDBACK = 9;
    /**
     * Status: `Em Disputa`
     */
    public const IN_DISPUTE = 10;
}