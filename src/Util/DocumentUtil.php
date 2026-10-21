<?php

namespace Ipag\Sdk\Util;

use Kubinyete\Assertation\Assert;

abstract class DocumentUtil
{
    private const CNPJ_WEIGHTS = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

    /**
     * Valida um documento que pode ser CPF ou CNPJ e o retorna sem máscara.
     *
     * Um documento com letras só pode ser CNPJ alfanumérico. Com 11 dígitos, o
     * documento é sempre CPF: completado com zeros à esquerda, um CPF pode passar
     * também na validação de CNPJ (todo CPF iniciado em "00" passa). Nos outros
     * tamanhos, o valor é completado com zeros e vale como CNPJ quando for um
     * CNPJ válido, e como CPF caso contrário.
     *
     * @param mixed $document
     * @return string|null documento sem máscara, ou null se for inválido
     */
    public static function cpfCnpj($document): ?string
    {
        $document = preg_replace('/[^A-Za-z0-9]/', '', strval($document));

        if (preg_match('/[A-Za-z]/', $document)) {
            return self::cnpj($document);
        }

        $assert = Assert::value($document)->asCpf(false);

        if (strlen($document) !== 11) {
            $assert = $assert->or()->asCnpj(false);
        }

        return $assert->get();
    }

    /**
     * Valida um CNPJ, numérico ou alfanumérico, e o retorna sem máscara e em
     * maiúsculas.
     *
     * O CNPJ alfanumérico tem 12 caracteres [A-Z0-9] e 2 dígitos verificadores
     * numéricos. O cálculo do DV é o mesmo do CNPJ numérico, com o valor de cada
     * caractere igual ao seu código ASCII menos 48 (documentação técnica da
     * Receita Federal).
     *
     * @param mixed $document
     * @return string|null CNPJ sem máscara, ou null se for inválido
     */
    public static function cnpj($document): ?string
    {
        $cnpj = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', strval($document)));

        if (!preg_match('/^[A-Z0-9]{12}[0-9]{2}$/', $cnpj) || $cnpj === str_repeat('0', 14)) {
            return null;
        }

        $base = substr($cnpj, 0, 12);
        $base .= self::cnpjCheckDigit($base);
        $base .= self::cnpjCheckDigit($base);

        return $base === $cnpj ? $cnpj : null;
    }

    private static function cnpjCheckDigit(string $base): int
    {
        $weights = array_slice(self::CNPJ_WEIGHTS, -strlen($base));
        $sum = 0;

        foreach (str_split($base) as $i => $char) {
            $sum += (ord($char) - ord('0')) * $weights[$i];
        }

        return $sum % 11 < 2 ? 0 : 11 - $sum % 11;
    }
}
