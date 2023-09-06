<?php

namespace Ipag\Sdk\Util;

use DateTime;
use DateTimeInterface;
use InvalidArgumentException;

abstract class DateUtil
{
    public const ISO_DATE_FORMAT = 'Y-m-d';

    public static function parseDate($date, string $format = self::ISO_DATE_FORMAT): DateTimeInterface
    {
        $date = self::tryParseDate($date, $format);

        if (!$date) {
            throw new InvalidArgumentException("Invalid date format ($date does not conform to $format)");
        }

        return $date;
    }

    public static function tryParseDate($date, string $format = self::ISO_DATE_FORMAT): ?DateTimeInterface
    {
        if (is_null($date) || $date instanceof DateTimeInterface) {
            return $date;
        }

        return DateTime::createFromFormat($format, $date) ?: null;
    }
}
