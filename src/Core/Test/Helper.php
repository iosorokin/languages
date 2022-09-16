<?php

namespace Core\Test;

use Faker\Factory;
use Faker\Generator;

abstract class Helper
{
    private Generator $faker;

    public static function new(): static
    {
        return app(static::class);
    }

    protected function faker(): Generator
    {
        $this->faker = $this->faker ?? Factory::create();

        return $this->faker;
    }
}
