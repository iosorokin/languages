<?php

declare(strict_types=1);

namespace Modules\Education\Source\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Support\Arr;
use Illuminate\Testing\TestResponse;

final class SourceApiHelper extends ApiHelper
{
    public function create(array $attributes = []): TestResponse
    {
        $attributes = SourceHelper::new()->generateAttributes() + $attributes;
        $attributes['language_type'] = Arr::get($attributes, 'language_type');
        $attributes['language_id'] = Arr::get($attributes, 'language_id');

        return $this->testCase->postJson(route('api.sources.create'), $attributes);
    }
}
