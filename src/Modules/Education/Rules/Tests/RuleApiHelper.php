<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Tests;

use Core\Test\Helpers\ApiHelper;
use Illuminate\Support\Arr;
use Illuminate\Testing\TestResponse;

final class RuleApiHelper extends ApiHelper
{
    public function store(array $attributes = []): TestResponse
    {
        $attributes = RuleHelper::new()->generateAttributes() + $attributes;
        $attributes['language_type'] = Arr::get($attributes, 'language_type');
        $attributes['language_id'] = Arr::get($attributes, 'language_id');

        return $this->testCase->postJson(route('api.rules.store'), $attributes);
    }
}
