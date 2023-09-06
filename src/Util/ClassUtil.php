<?php

namespace Ipag\Sdk\Util;

abstract class ClassUtil
{
    public static function basename(string $class): string
    {
        return basename(str_replace('\\', '/', $class));
    }
}
