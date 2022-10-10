<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use Core\Services\Morph\Exceptions\MorphException;
use Core\Services\Morph\Exceptions\MorphNotFound;
use Core\Services\Morph\Exceptions\NotUniqueMorph;
use Illuminate\Support\Arr;

final class Morph
{
    public static function getMorph(object|string $class): string
    {
        $interfaces = self::getInterfaces($class);
        $morphMap = config('morph');
        $matches = array_intersect_key($morphMap, $interfaces);

        return match (count($matches)) {
            1 => Arr::first($matches),
            0 => throw new MorphNotFound($class),
            default => throw new NotUniqueMorph($class),
        };
    }

    private static function getInterfaces(object|string $class): array
    {
        $class = is_object($class) ? $class::class : $class;
        if (interface_exists($class)) {
            return [$class => $class];
        } elseif (class_exists($class)) {
            return array_reverse(class_implements($class));
        }

        throw new MorphException(sprintf('%s not a class or interface', $class));
    }
}
