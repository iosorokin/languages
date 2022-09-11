<?php

namespace Core\Test\Actions\Languages;

use Faker\Factory;
use Illuminate\Testing\TestResponse;

trait LearningLanguageAction
{
    public function learnRealLanguage(int $id, array $attributes = []): TestResponse
    {
        $attributes = $this->generateLearningAttributes() + $attributes;

        return $this->post(route('api.real_languages.learn', compact('id')), $attributes);
    }

    private function generateLearningAttributes(): array
    {
        $faker = Factory::create();

        return [
            'title' => $faker->title(),
        ];
    }
}
