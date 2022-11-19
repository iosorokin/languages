<?php

namespace App\Base\Test\Helpers;

use Faker\Factory;
use Faker\Generator;

abstract class Helper
{
    private Generator $faker;

    protected function faker(): Generator
    {
        $this->faker = $this->faker ?? Factory::create();

        return $this->faker;
    }
}
