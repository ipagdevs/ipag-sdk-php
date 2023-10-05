<?php

namespace Ipag\Sdk\Core\Enums;

abstract class AcquirerStatus
{
    /** Aprovada e completada com sucesso  */
    public const APPROVED_OR_COMPLETED_SUCCESSFULLY = '00';
    /** Contate a central do seu cartão - nao tente novamente  */
    public const REFER_TO_CARD_ISSUER = '01';
    /** Transação nao permitida - nao tente novamente */
    public const INVALID_MERCHANT = '03';
    /** Contate a central do seu cartão - nao tente novamente  */
    public const PICK_UP = '04';
    /** Contate a central do seu cartão */
    public const DO_NOT_HONOR = '05';
    /** Lojista, contate o adquirente */
    public const ERROR = '06';
    /** Transação não permitida para o cartão - não tente novamente */
    public const PICK_UP_SPECIAL = '07';
    /** Nao autorizada - tente novamente usando autenticação */
    public const HONOUR_WITH_IDENTIFICATION = '08';
    /** Transação invalida - nao tente novamente */
    public const INVALID_TRANSACTION = '12';
    /** Valor da transação nao permitido - nao tente novamente */
    public const INVALID_AMOUNT = '13';
    /** Verifique os dados do cartão */
    public const INVALID_CARD_NUMBER = '14';
    /** Dados do cartão invalido - nao tente novamente */
    public const NO_SUCH_ISSUER = '15';
    /** Refazer a transação */
    public const RE_ENTER_TRANSACTION = '19';
    /** Parcelamento invalido - nao tente novamente */
    public const UNACCEPTABLE_TRANSACTION_FEE = '23';
    /** Erro no cartão - não tente novamente */
    public const FORMAT_ERROR = '30';
    /** Quantidade de tentativas excedidas - nao tente novamente */
    public const ALLOWABLE_PIN_TRIES_EXCEEDED = '38';
    /** Utilize função debito */
    public const NO_CREDIT_ACCOUNT = '39';
    /** Saque nao disponível - nao tente novamente */
    public const REQUEST_FUNCTION_NOT_SUPPORTED = '40';
    /** Transação não permitida - não tente novamente */
    public const LOST_CARD = '41';
    /** Utilize função credito */
    public const NO_UNIVERSAL_ACCOUNT = '42';
    /** Transação não permitida - não tente novamente */
    public const STOLEN_CARD = '43';
    /** Nao autorizada */
    public const NO_SUFFICIENT_FOUNDS = '51';
    /** Verifique os dados do cartão */
    public const EXPIRED_CARD = '54';
    /** Senha invalida */
    public const INCORRECT_PERSONAL_IDENTIFICATION_NUMBER = '55';
    /** Transação nao permitida para o cartão - nao tente novamente  */
    public const TRANSACTION_NOT_PERMITTED_TO_CARDHOLDER = '57';
    /** Transação nao permitida - nao tente novamente */
    public const TRANSACTION_NOT_PERMITTED_TO_TERMINAL = '58';
    /** Contate a central do seu cartão */
    public const SUSPECTED_FRAUD = '59';
    /** Valor excedido. Contate a central do seu cartão */
    public const EXCEEDS_WITHDRAWAL_AMOUNT_LIMIT = '61';
    /** Cartão nao permite transação internacional */
    public const RESTRICTED_CARD = '62';
    /** Verifique os dados do cartão */
    public const SECURITY_VIOLATION = '63';
    /** Valor da transação não permitido - não tente novamente */
    public const ORIGINAL_AMOUNT_INCORRECT = '64';
    /** Quantidade de saques excedida. Contate a central do seu cartão */
    public const EXCEEDS_WITHDRAWAL_FREQUENCY_LIMIT = '65';
    /** Senha inválida - não tente novamente */
    public const RESERVED_FOR_ISO_USE_PIN_ERROR = '74';
    /** Excedidas tentativas de senha. Contate a central do seu cartão */
    public const ALLOWABLE_NUMBER_OF_PIN_TRIES_EXCEEDED = '75';
    /** Conta destino invalida - nao tente novamente */
    public const RESERVED_FOR_PRIVATE_USE_INVALID_TARGET_ACCOUNT = '76';
    /** Conta origem invalida - nao tente novamente */
    public const RESERVED_FOR_PRIVATE_USE_INVALID_SOURCE_ACCOUNT = '77';
    /** Desbloqueie o cartão */
    public const RESERVED_FOR_PRIVATE_NEW_BLOCKED_CARD = '78';
    /** Erro no cartão - nao tente novamente */
    public const RESERVED_FOR_PRIVATE_USE_INVALID_CARD = '82';
    /** Falha de comunicação - tente mais tarde */
    public const ISSUER_OR_SWITCH_IS_INOPERATIVE = '91';
    /** Contate a central do seu cartão - não tente novamente */
    public const FINANCIAL_INSTITUTION_OR_INTERMEDIATE_NETWORK = '92';
    /** Transação não permitida para o cartão - não tente novamente */
    public const TRANSACTION_CANNOT_BE_COMPLETED_VIOLATION_OF_LAW = '93';
    /** Contate a central do seu cartão - não tente novamente */
    public const DUPLICATE_TRANSACTION = '94';
    /** Falha de comunicação - tente mais tarde */
    public const SYSTEM_MALFUNCTION = '96';
    /** Valor diferente da pre autorização - nao tente novamente */
    public const RESERVED_FOR_NATIONAL_USE_AMOUNT_MISMATCH = '99';
}