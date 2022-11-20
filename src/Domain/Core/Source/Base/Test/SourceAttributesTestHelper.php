<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Test;

use Faker\Generator;
use Illuminate\Support\Arr;

final class SourceAttributesTestHelper
{
    public static function full(): array
    {
        $attributes = [
            'id' => random_int(1, 10000),
            'created_at' => now(),
        ];

        return self::necessary() + $attributes;
    }

    public static function necessary(): array
    {
        $faker = new Generator();

        return [
            'student' => random_int(1, 1000),
            'language' => random_int(1, 1000),
            'type' => Arr::random(['movie', 'song']),
            'title' => $faker->title(),
            'description' => $faker->text(),
        ];
    }
}
