<?php

declare(strict_types=1);

namespace Core\Infrastructure\Services\Morph;

use Core\Infrastructure\Services\Morph\Exceptions\MorphNotFound;

final class Morph
{
    public static function getAlias(object|string $object): string
    {
        $className = is_object($object) ? $object::class : $object;
        $morphMap = config('morph');
        $hasObject = key_exists($className, $morphMap);
        if (! $hasObject) {
            throw new MorphNotFound($className);
        }

        return $morphMap[$className];
    }
}
