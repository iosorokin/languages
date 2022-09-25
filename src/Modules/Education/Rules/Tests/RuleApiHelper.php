<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Tests;

use Core\Test\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;

final class RuleApiHelper extends ApiHelper
{
    public function store(int $languageId, string $languageType, array $attributes = []): TestResponse
    {
        $attributes = RuleHelper::new()->generateAttributes() + $attributes;
        $attributes['language_type'] = $languageType;
        $attributes['language_id'] = $languageId;

        return $this->testCase->postJson(route('api.rules.store'), $attributes);
    }
}
