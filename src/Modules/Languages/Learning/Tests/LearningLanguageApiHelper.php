<?php

declare(strict_types=1);

namespace Modules\Languages\Learning\Tests;

use Core\Test\EndpointCase;
use Core\Test\Helper;
use Illuminate\Testing\TestResponse;

final class LearningLanguageApiHelper extends Helper
{
    public function __construct(
        private LearningLanguageHelper $learningLanguageHelper,
    ) {}

    public function learn(EndpointCase $testCase, int $id, array $attributes = []): TestResponse
    {
        $attributes = $this->learningLanguageHelper->generateAttributes() + $attributes;

        return $testCase->postJson(route('api.real_languages.learn', compact('id')), $attributes);
    }
}
