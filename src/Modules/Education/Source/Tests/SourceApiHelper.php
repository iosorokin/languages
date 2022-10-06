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

        return $this->testCase->postJson(route('api.user.sources.create', [
            'language_id' => $attributes['language_id']
        ]), $attributes);
    }
}
