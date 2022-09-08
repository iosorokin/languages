<?php

namespace Core\Test\Actions\Languages;

use Faker\Factory;
use Illuminate\Testing\TestResponse;

trait LearningLanguageAction
{
    public function learnRealLanguage(int $languageId, array $attributes = []): TestResponse
    {
        return $this->post(route('web.real_languages.learn'), $attributes);
    }

    private function getLearningAttributes(): array
    {
        $faker = Factory::create();

        return [
            'title' => $faker->title(),
        ];
    }
}
