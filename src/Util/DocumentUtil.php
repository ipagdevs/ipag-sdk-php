<?php

namespace Ipag\Sdk\Util;

use Kubinyete\Assertation\Assert;

abstract class DocumentUtil
{
    /**
     * Valida um documento que pode ser CPF ou CNPJ e o retorna sem máscara.
     *
     * Com 11 dígitos, o documento é sempre CPF: completado com zeros à esquerda,
     * um CPF pode passar também na validação de CNPJ (todo CPF iniciado em "00"
     * passa). Nos outros tamanhos, o valor é completado com zeros e vale como
     * CNPJ quando for um CNPJ válido, e como CPF caso contrário.
     *
     * @param mixed $document
     * @return string|null documento sem máscara, ou null se for inválido
     */
    public static function cpfCnpj($document): ?string
    {
        $assert = Assert::value($document)->asCpf(false);

        if (strlen(preg_replace('/[^0-9]/', '', strval($document))) !== 11) {
            $assert = $assert->or()->asCnpj(false);
        }

        return $assert->get();
    }
}
