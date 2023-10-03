<?php

namespace Ipag\Sdk\Util;

abstract class ArrayUtil
{
    public const ACCESS_SEPARATOR = '.';

    public static function get(string $path, array $array, $default = null)
    {
        $splitPath = explode(self::ACCESS_SEPARATOR, $path);

        while (is_array($array) && ($key = array_shift($splitPath))) {
            if (array_key_exists($key, $array)) {
                $array = &$array[$key];
            } else {
                $array = null;
            }
        }

        return is_null($array) || !empty($splitPath) ? $default : $array;
    }

    public static function set(string $path, array &$array, $value = null): void
    {
        $splitPath = explode(self::ACCESS_SEPARATOR, $path);

        while (is_array($array) && ($key = array_shift($splitPath))) {
            if (!$splitPath) {
                $array[$key] = $value;
            } else {
                if (array_key_exists($key, $array) && is_array($array[$key])) {
                    $array = &$array[$key];
                } else {
                    $array[$key] = [];
                    $array = &$array[$key];
                }
            }
        }
    }

    /**
     * Retorna um nova array de strings dentro do array informado.
     *
     * @param array $data
     * @return array
     */
    public static function extractStrings(array $data): array
    {
        return array_reduce($data, function ($strings, $value) {
            if (is_array($value)) {
                return array_merge($strings, self::extractStrings($value));
            } elseif (is_string($value) && !is_numeric($value)) {
                $strings[] = $value;
            }
            return $strings;
        }, []);
    }

}