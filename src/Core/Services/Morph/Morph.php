<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use Illuminate\Support\Arr;

final class Morph
{
    public static function getMorph(string|object $class): string
    {
        $interfaces = array_reverse(class_implements($class));
        $morphMap = config('morph');
        $matches = array_intersect_key($morphMap, $interfaces);

        return match (count($matches)) {
            1 => Arr::first($matches),
            0 => throw new MorphNotFound($class),
            default => throw new NotUniqueMorph($class),
        };
    }
}
