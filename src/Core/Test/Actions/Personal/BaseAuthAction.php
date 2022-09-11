<?php

namespace Core\Test\Actions\Personal;

use Faker\Factory;
use Illuminate\Testing\TestResponse;

trait BaseAuthAction
{
    public function loginLearnerWithApi(array $attributes): TestResponse
    {
        return $this->post(route('api.learners.login'), $attributes);
    }

    public function generateBaseAuthAttributes(array $attributes = []): array
    {
        $faker = Factory::create();

        return [
            'email' => $faker->safeEmail(),
            'password' => $faker->password(8, 255),
        ];
    }
}
