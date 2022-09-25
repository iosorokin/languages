<?php

declare(strict_types=1);

namespace Modules\Container\Tests;

use Core\Test\EndpointCase;
use Core\Test\Helper;
use Illuminate\Testing\TestResponse;

final class SourceApiHelper extends Helper
{
    public function __construct(
        private SourceHelper $sourceHelper,
    ) {}

    public function create(
        EndpointCase $testCase,
        string $languageType,
        int $languageId,
        array $attributes = []
    ): TestResponse
    {
        $attributes = $this->sourceHelper->generateAttributes() + $attributes;
        $attributes['type'] = $languageType;
        $attributes['id'] = $languageId;

        return $testCase->postJson(route('api.sources.create'), $attributes);
    }
}
