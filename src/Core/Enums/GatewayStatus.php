<?php

namespace Ipag\Sdk\Core\Enums;

abstract class GatewayStatus
{
    /** A operação foi concluída com sucesso */
    public const SUCCEED = 'P0';
    /** A operação não foi concluída devido à um erro */
    public const FAILED_UNKNOWN = 'P1';
    /** A operação foi ABORTADA */
    public const ABORTED = 'P2';
    /** A operação foi RECUSADA pelo processador de pagamentos devido a um limitador */
    public const REFUSED_LIMITER = 'P3';
    /** A operação foi RECUSADA pelo processador de pagamentos */
    public const REFUSED_UNKNOWN = 'P4';
    /** A transação está em quarentena */
    public const QUARANTINE = 'P5';
    /** O cartão de informado expirou ou possui dados de vencimento incorretos  */
    public const EXPIRED = 'P6';
    /** O cartão e/ou cliente informado estão/está na lista negra  */
    public const BLACKLIST = 'P7';
    /** O processo foi iniciado  */
    public const PROCESS_INITIALIZED = 'P9';
    /** A transação foi APROVADA automaticamente devido as regras de antifraude   */
    public const TRANSACTION_ANTIFRAUD_SUCCEED = 'F0';
    /** A transação foi RECUSADA automaticamente devido as regras de antifraude   */
    public const TRANSACTION_ANTIFRAUD_REFUSED = 'F1';
    /** A transação foi avaliada pelo antifraude, porém sua ação posterior falhou (captura/cancelamento)    */
    public const TRANSACTION_ANTIFRAUD_FAILED = 'F2';
}