<?php

namespace Ipag\Sdk\Util;

abstract class StateUtil
{
    private static $states = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins'
    ];

    public static function transformState(string $state): ?string
    {
        $state = strtoupper(self::sanitizeString(trim($state)));

        if (array_key_exists(strtoupper(trim($state)), self::$states)) {
            return $state;
        }

        $found =
            array_search
            (
                $state,
                array_map(function ($v) {
                    return strtoupper(self::sanitizeString($v));
                }, self::$states)
            );

        return $found ? $found : null;
    }

    private static function sanitizeString($str)
    {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[ÁÀÂÃÄ]/ui', 'A', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[ÉÈÊ]/ui', 'E', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[ÍÌ]/ui', 'I', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[ÓÒÔÕÖ]/ui', 'O', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ÚÙÜ]/ui', 'U', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        $str = preg_replace('/[Ç]/ui', 'C', $str);
        $str = preg_replace('/[ñ]/ui', 'n', $str);
        $str = preg_replace('/[Ñ]/ui', 'N', $str);
        $str = preg_replace('/\s/ui', '_', $str);

        return $str;
    }

}