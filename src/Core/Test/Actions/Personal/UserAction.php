<?php

namespace Core\Test\Actions\Personal;

use Faker\Factory;

trait UserAction
{
    public function getCreateUserParams(): array
    {
        $faker = Factory::create();

        return [
            'name' => $faker->name(),
        ];
    }
}
