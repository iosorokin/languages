<?php

namespace Core\Test\Actions\Education;

use Faker\Factory;
use Illuminate\Support\Arr;
use Illuminate\Testing\TestResponse;

trait SourceAction
{
    public function createSourceByApi(string $languageType, int $languageId, array $attributes = []): TestResponse
    {
        $attributes = $this->generateSourceAttributes() + $attributes;
        $attributes['type'] = $languageType;
        $attributes['id'] = $languageId;

        return $this->post(route('api.sources.create'), $attributes);
    }

    public function generateSourceAttributes(): array
    {
        $faker = Factory::create();

        return [
            'type' => Arr::random(['movie']),
            'title' => $faker->title(),
            'description' => $faker->text(),
        ];
    }
}
