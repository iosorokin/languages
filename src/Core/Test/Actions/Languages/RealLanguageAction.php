<?php

namespace Core\Test\Actions\Languages;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;

trait RealLanguageAction
{
    public function createRealLanguage(array $attributes = []): TestResponse
    {
        $attributes = $this->getRealLanguagesAttributes() + $attributes;

        return $this->post(route('api.real_languages.create'), $attributes);
    }

    public function indexRealLanguages(array $attributes = []): TestResponse
    {
        return $this->get(route('api.real_languages.index', $attributes));
    }

    public function showRealLanguage(array $attributes = []): TestResponse
    {
        return $this->get(route('api.real_languages.show', $attributes));
    }

    public function getRealLanguagesAttributes(): array
    {
        $faker = Factory::create();

        return [
            'name' => Str::random(),
            'native_name' => Factory::create($faker->locale())->title(),
            'code' => $faker->languageCode(),
        ];
    }
}
