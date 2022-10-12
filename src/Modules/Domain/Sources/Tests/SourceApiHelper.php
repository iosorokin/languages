<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use Modules\Domain\Sources\Structures\Source;

final class SourceApiHelper extends ApiHelper
{
    public function store(array $attributes = []): TestResponse
    {
        $attributes = SourceHelper::new()->generateAttributes() + $attributes;

        return $this->testCase->postJson(route('api.user.sources.store', [
            'language_id' => $attributes['language_id']
        ]), $attributes);
    }

    public function show(Source|int $source, array $attributes = []): TestResponse
    {
        $attributes['source_id'] = is_int($source) ? $source : $source->getId();

        return $this->testCase->getJson(route('api.sources.show', $attributes));
    }
}
