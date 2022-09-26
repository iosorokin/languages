<?php

declare(strict_types=1);

namespace Modules\Languages\Learning\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class LearningLanguageApiHelper extends ApiHelper
{
    public function learn(int $id, array $attributes = []): TestResponse
    {
        $attributes = LearningLanguageHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.real_languages.learn', compact('id')), $attributes);
    }
}
