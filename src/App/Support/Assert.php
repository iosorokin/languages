<?php

namespace App\Support;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert as BaseAssert;

class Assert extends BaseAssert
{
    public static function relationLoaded(Model $model, string|array $relations): void
    {
        foreach (Arr::wrap($relations) as $relation) {
            if (! $model->relationLoaded($relation)) {
                throw new Exception(sprintf('Relation %s did not load', $relation));
            }
        }
    }

    public static function isNotSet(array|object $value, string $key, string $message = ''): void
    {
        if (! self::checkIsSet($value, $key)) {
            static::reportInvalidArgument(\sprintf(
                $message ?: 'Key %s in source %s is set',
                $key,
                static::typeToString($value),
            ));
        }
    }

    public static function isSet(array|object $value, string $key, string $message = ''): void
    {
        if (self::checkIsSet($value, $key)) {
            static::reportInvalidArgument(\sprintf(
                $message ?: 'Key %s in source %s is not set',
                $key,
                static::typeToString($value),
            ));
        }
    }

    private static function checkIsSet(array|object $source, string $key): bool
    {
        if (is_object($source)) {
            return isset($source->$key);
        }

        return isset($source[$key]);
    }
}
