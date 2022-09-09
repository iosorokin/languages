<?php

namespace Core\Test\Actions\Languages;

use Faker\Factory;
use Illuminate\Testing\TestResponse;

trait LearningLanguageAction
{
    public function learnRealLanguage(int $id, array $attributes = []): TestResponse
    {
        return $this->post(route('api.real_languages.learn', compact('id')), $attributes);
    }

    private function getLearningAttributes(): array
    {
        $faker = Factory::create();

        return [
            'title' => $faker->title(),
        ];
    }
}
