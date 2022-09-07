<?php

namespace App\Extensions;

use Webmozart\Assert\Assert as BaseAssert;

class Assert extends BaseAssert
{
    public static function isNotSet(array|object $value, string $key, string $message = ''): void
    {
        if (self::isset($value, $key)) {
            static::reportInvalidArgument(\sprintf(
                $message ?: 'Key %s in source %s is set',
                $key,
                static::typeToString($value),
            ));
        }
    }

    private static function isset(array|object $source, string $key): bool
    {
        if (is_object($source)) {
            return isset($source->$key);
        }

        return isset($source[$key]);
    }
}
